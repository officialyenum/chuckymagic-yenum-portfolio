/*
---------------------------------
    : Custom - Switchery js :
---------------------------------
*/
!function($) {
  "use strict";
      /* -- Switchery - Colored Switches -- */
      var primary = document.querySelector('.js-switch-primary');
      var switchery = new Switchery(primary, { color: '#1ba4fd' });
      var secondary = document.querySelector('.js-switch-secondary');
      var switchery = new Switchery(secondary, { color: '#b8d1e1' });
      var success = document.querySelector('.js-switch-success');
      var switchery = new Switchery(success, { color: '#3dcd8b' });
      var danger = document.querySelector('.js-switch-danger');
      var switchery = new Switchery(danger, { color: '#e75c62' });
      var warning = document.querySelector('.js-switch-warning');
      var switchery = new Switchery(warning, { color: '#ffb129' });      
      var info = document.querySelector('.js-switch-info');
      var switchery = new Switchery(info, { color: '#67d1e1' });
      var light = document.querySelector('.js-switch-light');
      var switchery = new Switchery(light, { color: '#ebebf6' });
      var dark = document.querySelector('.js-switch-dark');
      var switchery = new Switchery(dark, { color: '#181a39' });
      /* -- Switchery - Small Switches -- */
      var primary_small = document.querySelector('.js-switch-primary-small');
      var switchery = new Switchery(primary_small, { color: '#1ba4fd', size: 'small' });
      var secondary_small = document.querySelector('.js-switch-secondary-small');
      var switchery = new Switchery(secondary_small, { color: '#b8d1e1', size: 'small' });
      var success_small = document.querySelector('.js-switch-success-small');
      var switchery = new Switchery(success_small, { color: '#3dcd8b', size: 'small' });
      var danger_small = document.querySelector('.js-switch-danger-small');
      var switchery = new Switchery(danger_small, { color: '#e75c62', size: 'small' });
      var warning_small = document.querySelector('.js-switch-warning-small');
      var switchery = new Switchery(warning_small, { color: '#ffb129', size: 'small' });      
      var info_small = document.querySelector('.js-switch-info-small');
      var switchery = new Switchery(info_small, { color: '#67d1e1', size: 'small' });
      var light_small = document.querySelector('.js-switch-light-small');
      var switchery = new Switchery(light_small, { color: '#ebebf6', size: 'small' });
      var dark_small = document.querySelector('.js-switch-dark-small');
      var switchery = new Switchery(dark_small, { color: '#181a39', size: 'small' });
      /* -- Switchery - Large Switches -- */
      var primary_large = document.querySelector('.js-switch-primary-large');
      var switchery = new Switchery(primary_large, { color: '#1ba4fd', size: 'large' });
      var secondary_large = document.querySelector('.js-switch-secondary-large');
      var switchery = new Switchery(secondary_large, { color: '#b8d1e1', size: 'large' });
      var success_large = document.querySelector('.js-switch-success-large');
      var switchery = new Switchery(success_large, { color: '#3dcd8b', size: 'large' });
      var danger_large = document.querySelector('.js-switch-danger-large');
      var switchery = new Switchery(danger_large, { color: '#e75c62', size: 'large' });
      var warning_large = document.querySelector('.js-switch-warning-large');
      var switchery = new Switchery(warning_large, { color: '#ffb129', size: 'large' });      
      var info_large = document.querySelector('.js-switch-info-large');
      var switchery = new Switchery(info_large, { color: '#67d1e1', size: 'large' });
      var light_large = document.querySelector('.js-switch-light-large');
      var switchery = new Switchery(light_large, { color: '#ebebf6', size: 'large' });
      var dark_large = document.querySelector('.js-switch-dark-large');
      var switchery = new Switchery(dark_large, { color: '#181a39', size: 'large' });
      /* -- Switchery - Multicolor Switches -- */
      var primary_multicolor = document.querySelector('.js-switch-primary-multicolor');
      var switchery = new Switchery(primary_multicolor, { color: '#1ba4fd', jackColor: '#dbe5fd' });
      var secondary_multicolor = document.querySelector('.js-switch-secondary-multicolor');
      var switchery = new Switchery(secondary_multicolor, { color: '#b8d1e1', jackColor: '#e9eaed' });
      var success_multicolor = document.querySelector('.js-switch-success-multicolor');
      var switchery = new Switchery(success_multicolor, { color: '#3dcd8b', jackColor: '#a5ecc4' });
      var danger_multicolor = document.querySelector('.js-switch-danger-multicolor');
      var switchery = new Switchery(danger_multicolor, { color: '#e75c62', jackColor: '#ffe4e6' });
      var warning_multicolor = document.querySelector('.js-switch-warning-multicolor');
      var switchery = new Switchery(warning_multicolor, { color: '#ffb129', jackColor: '#fef7e6' });      
      var info_multicolor = document.querySelector('.js-switch-info-multicolor');
      var switchery = new Switchery(info_multicolor, { color: '#67d1e1', jackColor: '#c7ecee' });
      var light_multicolor = document.querySelector('.js-switch-light-multicolor');
      var switchery = new Switchery(light_multicolor, { color: '#ebebf6', jackColor: '#e2e6ea' });
      var dark_multicolor = document.querySelector('.js-switch-dark-multicolor');
      var switchery = new Switchery(dark_multicolor, { color: '#181a39', jackColor: '#7e7e7e' });
      /* -- Switchery - On-Off Multicolor Switches -- */
      var primary_multicolor_on_off = document.querySelector('.js-switch-primary-multicolor-on-off');
      var switchery = new Switchery(primary_multicolor_on_off, { color: '#1ba4fd', secondaryColor: '#949ca9', jackColor: '#dbe5fd', jackSecondaryColor: '#e9eaed' });
      var secondary_multicolor_on_off = document.querySelector('.js-switch-secondary-multicolor-on-off');
      var switchery = new Switchery(secondary_multicolor_on_off, { color: '#b8d1e1', secondaryColor: '#1ba4fd', jackColor: '#e9eaed', jackSecondaryColor: '#dbe5fd' });
      var success_multicolor_on_off = document.querySelector('.js-switch-success-multicolor-on-off');
      var switchery = new Switchery(success_multicolor_on_off, { color: '#3dcd8b', secondaryColor: '#e75c62', jackColor: '#a5ecc4', jackSecondaryColor: '#ffe4e6' });
      var danger_multicolor_on_off = document.querySelector('.js-switch-danger-multicolor-on-off');
      var switchery = new Switchery(danger_multicolor_on_off, { color: '#e75c62', secondaryColor: '#3dcd8b', jackColor: '#ffe4e6', jackSecondaryColor: '#a5ecc4' });
      var warning_multicolor_on_off = document.querySelector('.js-switch-warning-multicolor-on-off');
      var switchery = new Switchery(warning_multicolor_on_off, { color: '#ffb129', secondaryColor: '#67d1e1', jackColor: '#fef7e6', jackSecondaryColor: '#c7ecee' });
      var info_multicolor_on_off = document.querySelector('.js-switch-info-multicolor-on-off');
      var switchery = new Switchery(info_multicolor_on_off, { color: '#67d1e1', secondaryColor: '#ffb129', jackColor: '#c7ecee', jackSecondaryColor: '#fef7e6' });
      var light_multicolor_on_off = document.querySelector('.js-switch-light-multicolor-on-off');
      var switchery = new Switchery(light_multicolor_on_off, { color: '#ebebf6', secondaryColor: '#181a39', jackColor: '#e2e6ea', jackSecondaryColor: '#7e7e7e' });
      var dark_multicolor_on_off = document.querySelector('.js-switch-dark-multicolor-on-off');
      var switchery = new Switchery(dark_multicolor_on_off, { color: '#181a39', secondaryColor: '#ebebf6', jackColor: '#7e7e7e', jackSecondaryColor: '#e2e6ea' });
}(window.jQuery);