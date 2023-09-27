import './bootstrap';


// Import all of CoreUI's JS
import * as coreui from '@coreui/coreui';

window.coreui = coreui;

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
window.SPINNER = `<span class="spinner-border spinner-border-sm"></span>`;
