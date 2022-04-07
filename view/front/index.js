var sendings = [];
var removables = [];
var updatings = [];

function erase_operators() {
    sendings = []
    removables = []
    updatings = []
}

//create section
function add_post(el) {
    parent_node = el.parentNode
    if (parent_node.lastElementChild.className === "seed") {
        return false
    }
    seed_node = document.createElement("div")
    seed_node.className = "seed-add"
    seed_node.innerHTML = make_inner()
    parent_node.appendChild(seed_node)
}

function store(el, update = false) {
    parent_node = el.parentNode
    inputs = el.parentNode.querySelectorAll("input")

    input_id = update ? parent_node.id : get_new_id();
    input_name = inputs[0].value
    input_desc = inputs[1].value
    input_parent = update ? inputs[2].value :
        el.parentNode.parentNode.id ? el.parentNode.parentNode.id : 0;

    new_element = [input_id, input_name, input_desc, input_parent]
    new_view = [input_name, input_desc]

    parent_node.className = "node"
    parent_node.id = input_id

    change_remove_inner(parent_node)
    parent_node.insertAdjacentHTML("afterbegin", get_node(new_view))

    update ? (updatings = unique(updatings, new_element)) : sendings.push(new_element)
}

function cancel(el) {
    el.parentNode.remove();
}

//update section
function change_val(el) {
    parent_node = el.parentNode
    inner_text = parent_node.querySelector("p").innerText.split("-")

    id = el.parentNode.id
    parent_id = el.parentNode.parentNode.id || 0
    name = inner_text[0]
    description = inner_text[1]
    update_node = document.createElement("div")
    update_node.className = "seed-update"
    update_node.id = id
    change_remove_inner(parent_node)
    update_node_inner =
        get_line() +
        get_input(name, "Name") +
        get_input(description, "Description") +
        get_input(parent_id, "Parent ID") +
        get_update_button()
    parent_node.insertAdjacentHTML("afterbegin", update_node_inner)
}

//delete section
function remove_bacteries(el) {
    let parent = el.parentNode
    ids_to_delete(el.parentNode)

    sendings = remove_matches(sendings, removables)
    updatings = remove_matches(updatings, removables)

    parent.remove()
}

function ids_to_delete(el) {
    to_delete = []
    to_delete.push(el.id)

    el.querySelectorAll(".node").forEach(element => {
        to_delete.push(element.id)
    });

    removables = removables.concat(to_delete)
    removables = [...new Set(removables)]
}

function remove_matches(array, removables) {
    clear_s_at = []
    clear_r_at = []
    array.forEach((elem, index_s) => {
        sql_id = elem[0].toString()
        index_r = removables.findIndex(el => id === el)

        if (index_r !== -1) {
            clear_s_at.push(index_s)
            clear_r_at.push(index_r)
        }
    });
    array = brush_array(array, clear_s_at)
    removables = brush_array(removables, clear_r_at)

    return array
}

function commit_changes() {
    let formData = new FormData();
    let url = "./services/manage_database.php";
    formData.append('bacteries', sendings);
    formData.append('remove', removables);
    formData.append('update', updatings);

    fetch(url, {
        method: "POST",
        body: formData,
    })
        .then(response => response.json())
        .then(json => {
            console.log(json);
            erase_operators();
            alert("Сообщение: " + json)
        })
        .catch(error => {
            console.error(error);
            alert("Сообщение: " + error)
        })
}