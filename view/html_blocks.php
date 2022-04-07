<?php
function get_add_button($text = "Ad")
{
    return "<button class='styled-button' onclick='add_post(this)'>$text</button>";
}
function get_remove_button()
{
    return "<button class='styled-button' onclick='remove_bacteries(this)'>Rm</button>";
}
function get_change_button()
{
    return "<button class='styled-button' onclick='change_val(this)'>Ch</button>";
}
function get_store_button()
{
    return "<button class='styled-button' onclick='commit_changes(this)'>Сохранить</button>";
}
function get_show_button()
{
    return "<button class='show-button' onclick='show_hide_child(this)'>Sh</button>";
}
function get_node($id = 0, $hidden)
{
    return "<div class='node' id='$id' $hidden>";
}
function get_paragraph($text, $class = false, $evented = false, $hidden = false)
{
    $evented = $evented ? "onclick='show_description(this)'" : "";
    $class = $class ? "class='$class'" : "";
    $hidden = $hidden ? "style='display:none;'" : "";
    return "<p $evented $class $hidden>$text</p>";
}
function get_line()
{
    return "<span class='vertical-line'></span>";
}
function get_login_button()
{
    return "<a style='color: white;' href='login.php'>Вход</a>";
}
function get_logout_button()
{
    return "<a style='color: white;' onclick='console.log('hello')' href='logout.php'>Выход</a>";
}
function get_floating()
{
    return "<div class='description-area' style='display:none;'><p>Hello</p></div>";
}
function get_controls($id, $name, $description, $hidden = 'hidden')
{
    // echo $_SESSION["cargo"];
    if ($_SESSION["cargo"]) {
        return
            get_node($id, '') .
            get_line() .
            get_add_button() .
            get_remove_button() .
            get_change_button() .
            get_paragraph("$name - $description", "name-desc");
    }
    return
        get_node($id, $hidden) .
        get_line() .
        get_paragraph("$name", "name", true) .
        get_paragraph("$description", "description", false, true);
}
