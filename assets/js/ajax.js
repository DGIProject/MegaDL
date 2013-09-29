function addMegaDL()
{
    console.log('AddMegaDL');

    var link = document.getElementById('linkMegaDL').value;

    console.log(link);

    var OAjax;

    if (window.XMLHttpRequest) OAjax = new XMLHttpRequest();
    else if (window.ActiveXObject) OAjax = new ActiveXObject('Microsoft.XMLHTTP');
    OAjax.open('POST',"addMegaDL.php",true);
    OAjax.onreadystatechange = function()
    {
        if (OAjax.readyState == 4 && OAjax.status==200)
        {
            console.log(OAjax.responseText);
        }
    }

    OAjax.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    OAjax.send('link=' + link);
}

function pauseMegaDL(id)
{

}

function deleteMegaDL(id)
{

}