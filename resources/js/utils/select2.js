import select2 from "select2";

select2($);

export function toSelect2DataSource(data, idProperty, textProperty, selectedId, readonly) {
    data.forEach((item, index) => {
        let isSelected = item[idProperty] == selectedId;
        data[index] = { id: item[idProperty], text: item[textProperty], selected: isSelected };
        if (readonly === true && selectedId != item[idProperty]) {
            data[index].disabled = true;
        }
    });
    return data;
}

const select2Options = { theme: 'bootstrap' };
export function select2Init($element, options) {
    const mergedConfig = { ...select2Options, ...options };

    return $element.select2(mergedConfig);
}

export function setSelect2Data($element, data, placeHolder) {
    $element.empty();
    if (placeHolder != undefined) {
        data.unshift({ id: '', text: `-- Select ${placeHolder} --` });
    }
    select2Init($element, { data: data });
}
