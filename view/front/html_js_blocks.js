function make_inner() {
    let inner_text = ""
    let innerTextArray = [
        "<span class='vertical-line'></span>",
        "<input type='text' name='hello' placeholder='name'/>",
        "<input type='text' name='description' placeholder='description'/>",
        "<button class='styled-button grn-btn' onclick='store(this)'>Установить</button>",
        "<button class='styled-button red-btn' onclick='cancel(this)'>Отменить</button>",
    ]

    innerTextArray.forEach(element => {
        inner_text += element
    });

    return inner_text
}

function get_node(name_desc) {
    return "<span class='vertical-line'></span>" +
        "<button class='styled-button' " +
        "onclick='add_post(this)'>Ad</button>" +
        "<button class='styled-button' onclick='remove_bacteries(this)'>Rm</button>" +
        "<button class='styled-button' onclick='change_val(this)'>Ch</button>" +
        "<p class='name-desc'>" + name_desc[0] + " - " + name_desc[1] + "</p>"
}

function get_input(value, placeholder) {
    return "<input type='text' value='" + value + "' placeholder='" + placeholder + "'/>"
}

function get_line() {
    return "<span class='vertical-line'></span>"
}

function get_update_button() {
    return "<button class='styled-button' onclick='store(this, true)'>Up</button>"
}