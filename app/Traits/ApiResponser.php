<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

trait ApiResponser
{
    private function successResponse($data, $code)
    {
        return response()->json($data, $code);
    }

    protected function errorResponse($message, $code)
    {
        return response()->json([ 'error' => $message, 'code' => $code], $code);
    }

    protected function showAll(ResourceCollection $collection, $code = 200)
    {
        if ($collection->isEmpty()) {
            return $this->successResponse(['data' => $collection], $code);
        }
        // $collection = $this->filterData($collection);
		// $collection = $this->sortData($collection);
		$collection = $this->paginate($collection);
		$collection = $this->cacheResponse($collection);
        return $this->successResponse($collection, $code);
    }

    protected function showOne(JsonResource $model, $code = 200)
    {
        return $this->successResponse(['data' => $model], $code);
    }

    protected function filterData(ResourceCollection $collection)
	{
		foreach (request()->query() as $query => $value) {
			$attribute = $query;

			if (isset($attribute, $value)) {
				$collection = $collection->where($attribute, $value);
			}
		}

		return $collection;
	}

	protected function sortData(Collection $collection)
	{
		if (request()->has('sort_by')) {
			$attribute = request()->sort_by;

			$collection = $collection->sortBy->{$attribute};
		}

		return $collection;
	}

    protected function paginate(ResourceCollection $collection)
    {
        $page = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 5;
        $results = $collection->slice(($page - 1) * $perPage, $perPage);
        $paginated = new LengthAwarePaginator($results, $collection->count(),$perPage, $page,[
            'path' => LengthAwarePaginator::resolveCurrentPath(),
        ]);
		$paginated->appends(request()->all());
        return $paginated;
    }

    protected function showMessage($message, $code = 200)
    {
        return $this->successResponse(['data' => $message], $code);
    }

    public function cacheResponse($collection)
    {
        $url = request()->url();
        $queryParams = request()->query();

        ksort($queryParams);

		$queryString = http_build_query($queryParams);

		$fullUrl = "{$url}?{$queryString}";

		return Cache::remember($fullUrl, 30, function() use($collection) {
			return $collection;
		});
    }
}
