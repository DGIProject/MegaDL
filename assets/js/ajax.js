var tableauListID = [];


Array.prototype.unset = function(val){
    var index = this.indexOf(val)
    if(index > -1){
        this.splice(index,1)
    }
}

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
            var addedInfo = OAjax.responseText.split(';');
            var linkId = addedInfo[0];
            var link = addedInfo[1];
            var newRow = document.getElementById('tabList').insertRow(-1);
            var newCell = newRow.insertCell(0);
            newCell.innerHTML = linkId;
            newRow.setAttribute("id",linkId);
            newCell.setAttribute("class","bold");
            newCell = newRow.insertCell(1);
            newCell.innerHTML = '<span id="filename'+linkId+'"><img src="assets/img/load.gif"></span>';
            newCell = newRow.insertCell(2);
            newCell.innerHTML = link;
            newCell = newRow.insertCell(3);
            newCell.innerHTML = '<span id="size'+linkId+'"><img src="assets/img/load.gif"></span>';
            newCell = newRow.insertCell(4);
            newCell.innerHTML = '<div class="progress progress-striped active"><div id="progress'+linkId+'" class="progress-bar"  role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div></div>';
            newCell = newRow.insertCell(5);
            newCell.innerHTML = '<button type="button" onclick="pauseMegaDL('+linkId+');" class="btn"><i class="glyphicon glyphicon-pause"></i></button><button type="button" onclick="deleteMegaDL('+linkId+');" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></button>';
            tableauListID.push(linkId);
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
    console.log('deleteMegaDL');
    var OAjax;

    if (window.XMLHttpRequest) OAjax = new XMLHttpRequest();
    else if (window.ActiveXObject) OAjax = new ActiveXObject('Microsoft.XMLHTTP');
    OAjax.open('POST',"deleteMegaDL.php",true);
    OAjax.onreadystatechange = function()
    {
        if (OAjax.readyState == 4 && OAjax.status==200)
        {
            if (OAjax.responseText == "true")
            {
                tableauListID.unset(id);
                document.getElementById(id).parentNode.removeChild(document.getElementById(id));
            }
        }
    }

    OAjax.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    OAjax.send('id=' + id);
}
function getPercentage(id)
{
    var OAjax;

    if (window.XMLHttpRequest) OAjax = new XMLHttpRequest();
    else if (window.ActiveXObject) OAjax = new ActiveXObject('Microsoft.XMLHTTP');
    OAjax.open('POST',"getPercent.php",true);
    OAjax.onreadystatechange = function()
    {
        if (OAjax.readyState == 4 && OAjax.status==200)
        {
            console.log(OAjax.responseText);
            if (OAjax.responseText != ";;;;;;;;;;")
            {
                values = OAjax.responseText.split(";;");
                if (values[0] == "100%")
                {
                    document.getElementById("progress"+id).classList.add("progress-bar-success");
                    tableauListID.unset(id);
                }

                document.getElementById("filename"+id).innerHTML = values[1];
                var sizeTxt = values[2]+" "+values[3]+" / "+values[4]+" "+values[5];
                document.getElementById("size"+id).innerHTML = sizeTxt;
                document.getElementById("progress"+id).style.width = values[0];
                console.log(values);
            }

        }
    }

    OAjax.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    OAjax.send('id=' + id);
}

function launchPercent()
{
    for (i=0;i<tableauListID.length;i++)
    {
      getPercentage(tableauListID[i]);
    }
}
window.setInterval("launchPercent()",10000);
window.onload = function()
{
    launchPercent();
}