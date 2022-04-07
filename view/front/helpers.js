function get_new_id() {
    id = 0;
    document.querySelectorAll(".node").forEach(element => {
        if (element.id > id) {
            id = Number(element.id)
        }
    });
    return ++id
}

function brush_array(arr, indexes) {
    return arr.filter(function (item, index) {
        return indexes.indexOf(index) == -1;
    });
}

function change_remove_inner(node, last_inner = 4) {
    for (let i = last_inner; i >= 0; i--) {
        node.children[i].remove();
    }
}

function unique(array_of_arrays, nel, mark = 0) {

    let check = false;
    array_of_arrays.forEach((el, i) => {
        if(el[mark] === nel[mark]) {
            array_of_arrays[i] = nel
            check = true
        }
    });
    
    if(!check) {
        array_of_arrays.push(nel)
    }

    return array_of_arrays
}

function show_hide_child(el) {
    parent_node = el.parentNode

    parent_node.childNodes.forEach(node => {
        if (node.className == "node") {
            if(node.hidden) {
                node.hidden = false
            } else {
                node.hidden = true
            }
        }
    });
}

function show_description(el) {
    description_text = el.parentNode.querySelector(".description").innerText
    description_area = document.querySelector(".description-area")
    description = description_area.querySelector("p")

    description.innerText = description_text
    description_area.style.display = "block"
}
