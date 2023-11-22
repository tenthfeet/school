import "./bootstrap";
// Core Js
import jQuery from "jquery";
window.$ = jQuery;
window.jQuery = jQuery;

import "tw-elements";

import SimpleBar from "simplebar";
window.SimpleBar = SimpleBar;
import "simplebar/dist/simplebar.css";

// animate css
import "animate.css";

// You will need a ResizeObserver polyfill for browsers that don't support it! (iOS Safari, Edge, ...)
import ResizeObserver from "resize-observer-polyfill";
window.ResizeObserver = ResizeObserver;

import leaflet from "leaflet";
window.leaflet = leaflet;

// Icon
import "iconify-icon";

// DATA-TABLE
import DataTable from "datatables.net-dt";
window.DataTable = DataTable;


window.SPINNER = '<iconify-icon class="animate-spin" icon="gg:spinner" width="24" height="24"></iconify-icon>';

const unshiftOrUpdate = function (array, item) {
    const i = array.findIndex(element => element.id === item.id);
    if (i > -1) {
        array[i] = item;
        return i;
    }
    else {
        array.unshift(item);
        return 0;
    }
};

window.unshiftOrUpdate = unshiftOrUpdate;
