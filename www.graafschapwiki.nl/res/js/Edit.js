function textOninput(thisElement)
{
    thisElement.style.height = "";
    thisElement.style.height = thisElement.scrollHeight + "px";
}

function insertSubParagraph(button)
{
    var title = button.previousSibling.previousSibling.previousSibling.cloneNode();
    title.value = "";

    var textbox = button.previousSibling.cloneNode();
    textbox.innerText = "";
    textbox.style.height = "50px";

    var newButton = button.cloneNode(true);


    button.parentNode.insertBefore(newButton, button.nextSibling);
    button.parentNode.insertBefore(textbox, button.nextSibling);
    button.parentNode.insertBefore(title, button.nextSibling);

}

window.onload = function ()
{
    var textAreas = document.getElementsByClassName("EditArea");

    for (var i = 0; i < textAreas.length; i++)
    {
        textAreas[i].setAttribute("oninput", "textOninput(this)");
        textOninput(textAreas[i]);
    }


    var editboxes = document.getElementsByClassName("subparagraph");
    for (var i = 0; i < editboxes.length; i++)
    {
        var button = document.createElement("BUTTON");
        button.innerText = "Add";
        button.setAttribute("onclick", "insertSubParagraph(this)");
        editboxes[i].parentNode.insertBefore(button, editboxes[i].nextSibling.nextSibling.nextSibling);


    }
};