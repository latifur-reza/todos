function makeEditable(element){
    var allClass = document.getElementsByClassName('close');
    for (var i = 0; i < allClass.length; i++) {
        allClass[i].style.visibility = 'hidden';
    }
    element.contentEditable = "true";
    element.focus();
}
function onKeyPressUpdate(event,element, id){
    if (event.keyCode == 13) {
        updateTitle(element, id);
        return false;
    }
}

function updateTitle(element, id){
    element.contentEditable = "false";
    var method = "put";
    var data = "Method=" + method + "&Id=" + id + "&Title=" + element.innerText;
    $.ajax({
        cache: false,
        type: "post",
        url: "src/Ajax/NoteData.php",
        data: data,
        success: function(response){
            getData();
        },
        error: function(e){
            console.log(e);
        }
    });
}

function onChangeUpdate(element) {
    var status = "";
    if(element.checked){
        status = "Completed";
    }else{
        status = "Active";
    }
    var method = "putstatus";
    var data = "Method=" + method + "&Id=" + element.value + "&Status=" + status;
    $.ajax({
        cache: false,
        type: "post",
        url: "src/Ajax/NoteData.php",
        data: data,
        success: function(response){
            getData();
        },
        error: function(e){
            console.log(e);
        }
    });
}

function onKeyPressInsert(event) {
    if (event.keyCode == 13) {
        var inputbox = document.getElementById('input-title');
        if(!isEmptyOrSpaces(inputbox.value)){
            var method = "post";
            var data = "Method=" + method + "&Title=" + inputbox.value;
            $.ajax({
                cache: false,
                type: "post",
                url: "src/Ajax/NoteData.php",
                data: data,
                success: function(response){
                    inputbox.value="";
                    getData();
                },
                error: function(e){
                    console.log(e);
                }
            });
        }
        inputbox.focus();
        return false;
    }
}

function isEmptyOrSpaces(str){
    return str === null || str.match(/^ *$/) !== null;
}

function onClickDelete(id) {
    var method = "delete";
    var data = "Method=" + method + "&Id=" + id;
    $.ajax({
        cache: false,
        type: "post",
        url: "src/Ajax/NoteData.php",
        data: data,
        success: function(response){
            getData();
        },
        error: function(e){
            console.log(e);
        }
    });
}

function onClickClearCompleted(){
    var method = "deletecompleted";
    var data = "Method=" + method;
    $.ajax({
        cache: false,
        type: "post",
        url: "src/Ajax/NoteData.php",
        data: data,
        success: function(response){
            getData();
        },
        error: function(e){
            console.log(e);
        }
    });
}

function getData(){
    var method = "get";
    var data = "Method=" + method;
    $.ajax({
        cache: false,
        type: "get",
        url: "src/Ajax/NoteData.php",
        data: data,
        success: function(response){
            renderHtml(JSON.parse(response));
        },
        error: function(e){
            console.log(e);
        }
    });
}

function renderHtml(data){
    var currentStatus = $('input[name=current-status]:checked').val();
    var countActive = 0;
    var countComplete = 0;
    var renderData = [];
    data.forEach(element => {
        if(element.status == "Active"){
            countActive ++;
        }else if(element.status == "Completed"){
            countComplete ++;
        }
        if(currentStatus == "Active" && element.status == "Active"){
            renderData.push(element);
        }else if(currentStatus == "Completed" && element.status == "Completed"){
            renderData.push(element);
        }else if(currentStatus == "All"){
            renderData.push(element);
        }
    });
    var htmlRender = "";
    renderData.forEach(element => {
        var isChecked = "";
        var hasStyle = "";
        if(element.status == "Completed"){
            isChecked = "Checked";
            hasStyle = 'style="text-decoration: line-through;"';
        }
        htmlRender += '<div class="data-item row"> \
            <div class="col-md-1"> \
                <span class="change-status"> \
                    <label> \
                        <input type="checkbox" onchange="onChangeUpdate(this)" name="status" value="'+element.id+'"'+ isChecked +'> \
                        <span><i class="fas fa-check"></i></span> \
                    </label> \
                </span> \
            </div> \
            <div class="col-md-11"> \
                <span onkeypress="return onKeyPressUpdate(event,this,'+element.id+')" ondblclick="makeEditable(this)" onBlur="updateTitle(this,'+element.id+')" class="note-title"'+ hasStyle +'>'+element.title+'</span> \
                <button onclick="onClickDelete('+element.id+')" type="button" class="close" aria-label="Close"> \
                    <span aria-hidden="true">&times;</span> \
                </button> \
            </div> \
        </div>';
    });
    
    document.getElementById("data").innerHTML = htmlRender;

    if(countActive == 0 || countActive == 1){
        document.getElementById("item-count").innerHTML = countActive + " item left";
    }else if(countActive > 1){
        document.getElementById("item-count").innerHTML = countActive + " items left";
    }
    if(countComplete > 0){
        document.getElementById("item-clear").innerHTML = '<span class="clear-completed" onclick="onClickClearCompleted()">Clear completed<span>';
    }else{
        document.getElementById("item-clear").innerHTML = "";
    }
    if(countActive + countComplete > 0){
        var allClass = document.getElementsByClassName('change-visibility');
        for (var i = 0; i < allClass.length; i++) {
            allClass[i].style.visibility = 'visible';
        }
    }else{
        var allClass = document.getElementsByClassName('change-visibility');
        for (var i = 0; i < allClass.length; i++) {
            allClass[i].style.visibility = 'hidden';
        }
    }
}
