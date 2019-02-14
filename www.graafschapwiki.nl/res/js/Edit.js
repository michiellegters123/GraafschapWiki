function textOninput(thisElement)
{
    thisElement.style.height = "";
    thisElement.style.height = thisElement.scrollHeight + "px";
}

window.onload = function()
{
    var textAreas = document.getElementsByClassName("EditArea");

    for(var i = 0; i < textAreas.length; i++)
    {
        textAreas[i].setAttribute("oninput", "textOninput(this)");
        textOninput(textAreas[i]);
    }
    console.log("yeet");
};