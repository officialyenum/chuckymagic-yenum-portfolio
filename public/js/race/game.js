/* * * * * * *
 * Load Game *
 * * * * * * */
$(document).ready(() => {
    $.ajaxSetup(
        {
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }
    );
    window.onload = main
});

var assets = [];
var player, stage, spritesheet;


function main() {
    var manifest = [
        { src: "sheet.json", id: "sheet1", type: "spritesheet" }
    ];

    var loader = new createjs.LoadQueue();
    loader.on("fileload", handleFileLoad);
    loader.on("complete", handleComplete);
    loader.loadManifest(manifest);
};

function handleFileLoad(event) {
    assets.push(event);
}

function handleComplete() {
    for (var i = 0; i < assets.length; i++) {
        var event = assets[i];
        var result = event.result;

        switch (event.item.id) {
            case 'sheet1':
                spriteSheet = result;
                break;
        }
    }

    initScene();
}

