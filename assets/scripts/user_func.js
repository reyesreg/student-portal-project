//General user functions (accessible to all)

//remove category from user subscription
function delUserCategory(catID) {
  window.location = "./php/inv_controllers/user_func/del_user_category.php?catID=" + catID;
}


//adds category to users subscription
function addUserCategory(catID) {
  window.location = "./php/inv_controllers/user_func/add_user_category.php?catID=" + catID;
}

/*****POST STUFF BELOW THIS LINE*****/

var cat_array = [];

//add category to post
function addCategory(e) {
  e.preventDefault();

  var selected_cat_ID = document.getElementById("select-cat").value;
  var selected_cat_name = document.getElementById("select-cat").options[selected_cat_ID-1].innerHTML;
  var display_cat = document.getElementById("cat-" + selected_cat_ID);

  if(display_cat == null) {
    document.getElementById("selected-cat").innerHTML += "<span class='tag subbed' id='cat-" + selected_cat_ID + "' onclick='removeCategory(" + selected_cat_ID + ")'>" + selected_cat_name + "</span>";
    cat_array.push(selected_cat_ID);
  }
}

//remove category from post
function removeCategory(id) {
  var selected_cat_ID = document.getElementById("cat-" + id);
  selected_cat_ID.parentNode.removeChild(selected_cat_ID);

  var index = cat_array.indexOf(id.toString());
  if (index > -1) {
    cat_array.splice(index, 1);
  }

  console.log(cat_array);
  return false;
}

function closeSubmitModal() {
  document.getElementById('submit-post').style.display = 'none';
}

function openSubmitModal(e) {
  e.preventDefault();

  if(cat_array.length > 0
    && document.getElementById("txt-title").value !== ''
    && document.getElementById("txt-desc").value !== ''
  ) {
    document.getElementById("inv-input").innerHTML = "<input type='hidden' value='"+ cat_array +"' name='cat'/>";
    document.getElementById('submit-post').style.display = 'flex';
  }
}

function submitPost() {
  document.getElementById('submit-post').style.display = 'none';
  document.getElementById('submit-post-form').submit();
}