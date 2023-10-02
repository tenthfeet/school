import select2 from "select2";

select2($);

export function toSelect2DataSource(data, idProperty, textProperty, selectedId) {
    data.forEach((item, index) => {
        let isSelected = item[idProperty] == selectedId;
        data[index] = { id: item[idProperty], text: item[textProperty], selected: isSelected };
    });
    return data;
}

const select2Options = { theme: 'bootstrap' };
export function select2Init(selector, options) {
    const mergedConfig = { ...select2Options, ...options };

    return $(selector).select2(mergedConfig);
}
