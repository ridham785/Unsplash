<x-app-layout>
<html>
    
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <title>Unsplash Images</title>
    <style>
        body {
    overflow-x: hidden;
}
img:hover {
    transform: scale(1.01);
}
        </style>
  </head>

    <body>
    <div class="container-fluid p-0 m-0">
        
        <!-- navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow" id="nav">
            <div class="container-fluid">
              <a class="navbar-brand" href="" id="brand">Unsplash</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                
                <form class="d-flex">
                  
                  <input class="form-control me-2" type="text" placeholder="Search image" id="searchKey">
                  <button class="btn btn-outline-dark" type="button" id="searchBtn">Search</button>
                </form>
              </div>
            </div>
            <button class="btn btn-success" onclick="show()">show
                  <button>
          </nav>

        <!-- search text -->    
        <div class="text-dark m-3 text-muted">
            <h3 id="searchQuery"></h3>
        </div>

        <!-- images -->
        <div class="row ps-3 pe-3">
            <div class="col-md-4" id="col-1"></div>
            <div class="col-md-4" id="col-2"></div>
            <div class="col-md-4" id="col-3"></div>
        </div>
        <ul class="uk-pagination" data-uk-pagination="{items:100, itemsOnPage:30}" id="pagination"></ul>
        <!-- error div -->
        <div class="m-5 text-center" id="errorGrid">
        </div>

        <!-- modal -->
        <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Image</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center" id="modalBody"></div>
                <div class="modal-footer">
                <a type="button" href ="" target="_blank" class="btn btn-success" id="imageViewLink">View</a>
                
                <button class="btn btn-success" onclick="add()">Add</button>
                </div>
            </div>
            </div>
        </div>

    </div>
    <div id="checkout" style="display:none;">[]</div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    


        





    
    <script> 
  // variables
const navbar = document.getElementById("nav");
const brandName = document.getElementById("brand");
const searchKey = document.getElementById("searchKey");
const searchBtn = document.getElementById("searchBtn");
const searchQuery = document.getElementById("searchQuery");
const column1 = document.getElementById("col-1");
const column2 = document.getElementById("col-2");
const column3 = document.getElementById("col-3");
const errorGrid = document.getElementById("errorGrid");
const modalBody = document.getElementById("modalBody");
const imageViewLink = document.getElementById("imageViewLink");



Add=[];
// APIs.
API_KEY = "r4q6Ijy9eBPD7587rjhPQSPk1OQqpGSCWoCjKMX0jxw";
apiUrl = "https://api.unsplash.com/photos/?client_id="+API_KEY+"&per_page=300";
searchUrl = "https://api.unsplash.com/search/photos/?client_id="+API_KEY+"&query=";

// emply array

imageURLS = [];

window.onload = (event) => {
    fetchData();
}

const fetchData = async () => {

    var tempUrl = apiUrl;

   

    const response = await (fetch(apiUrl).catch(handleError));
    const myJson = await response.json();

    var imageArrays = myJson;
    

    imageArrays.forEach(element => {
        imageURLS.push(element.urls.small);
    });
    console.log(imageURLS);

    displayImage();

}

var handleError = function(err) {
    console.warn(err);
    errorGrid.innerHTML = "<h4>Unable to fetch data "+err+"</h5>";
}

function displayImage() {
    errorGrid.innerHTML = "";
    if(imageURLS.length == 0) {
        errorGrid.innerHTML = "<h4>Unable to fetch data.</h5>";
        return;
    }

    column1.innerHTML = "";
    column2.innerHTML = "";
    column3.innerHTML = "";

    imageURLS.forEach((url,index) => {
        // dynamic image tag 
        var image = document.createElement('img');
        image.src = url;
        image.className="pt-4";
        image.setAttribute("width", "100%");
        image.setAttribute("onclick","displayFullImage(this.src)");

        if( (index + 1) % 3 == 0 ) {
            column1.appendChild(image);
        }
        if( (index + 2) % 3 == 0 ) {
            column2.appendChild(image);
        }
        if( (index + 3) % 3 == 0 ) {
            column3.appendChild(image);
        }
        
    });

}

function displayFullImage(src) {

    // dynamic image tag 
    var image = document.createElement('img');
    image.src = src;
    image.className="mt-3";
    image.setAttribute("width", "100%");

    modalBody.innerHTML = "";
    modalBody.appendChild(image);

    imageViewLink.href=src;

    var myModal = new bootstrap.Modal(document.getElementById('modal'), {});
    myModal.show();
}

searchBtn.addEventListener("click",function() {

    if(searchKey.value != ''){
        fetchSearchData(searchKey.value);
    }

});

const fetchSearchData = async (key) => {

    imageURLS = [];

    
    var tempUrl = searchUrl + key;

    

    searchQuery.innerHTML = searchKey.value;
    
    let response = await (fetch(tempUrl).catch(handleError));
    let myJson = await response.json();
    tempUrl += "&per_page="+myJson.total;

    response = await (fetch(tempUrl).catch(handleError));
    myJson = await response.json();

    console.log(myJson);

    var imageArrays = myJson.results;

    imageArrays.forEach(element => {
        imageURLS.push(element.urls.regular);
    });

    displayImage();

}



function add(){
    
    
    
    let checkoutObj = JSON.parse(document.getElementById("checkout").innerHTML);
checkoutObj.push(document.getElementById('modalBody').children[0].src);
checkoutObj = checkoutObj.filter((v, i, a) => a.indexOf(v) === i);
document.getElementById("checkout").innerHTML = JSON.stringify(checkoutObj)
 
 Add.push(JSON.parse(document.getElementById("checkout").innerHTML));
 console.log(Add);
 alert("added");

    
}
function show(){
    //const r = JSON.parse(document.getElementById("checkout").innerHTML);
    //Add.push(r);
    column1.innerHTML = "";
    column2.innerHTML = "";
    column3.innerHTML = "";
    if(JSON.parse(document.getElementById("checkout").innerHTML).length ==0){
        alert("No image added");
    }
    for (let i = 0; i < JSON.parse(document.getElementById("checkout").innerHTML).length; i++) {
        var image = document.createElement('img');
        image.src = JSON.parse(document.getElementById("checkout").innerHTML)[i] ;
        image.className="pt-4";
        image.setAttribute("width", "100%");
        image.setAttribute("onclick","displayFullImage(this.src)");
        
        column2.appendChild(image);

        

    }


}



    </script>
</body>
    </html>
</x-app-layout>
