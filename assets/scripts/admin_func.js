//Admin functions

//Approve a post
var chosenApprovedPost = "";

function closeApproveModal() {
  document.getElementById('approve-post').style.display = 'none';
}

function openApproveModal(id) {
  chosenApprovedPost = id;
  document.getElementById('approve-post').style.display = 'flex';
}

function approvePost() {
  document.getElementById('approve-post').style.display = 'none';
  window.location = "./php/inv_controllers/admin_func/approve_post.php?anID=" + chosenApprovedPost;
}

//Archive a post
var chosenArchivedPost = "";

function closeArchiveModal() {
  document.getElementById('archive-post').style.display = 'none';
}

function openArchiveModal(id) {
  chosenArchivedPost = id;
  document.getElementById('archive-post').style.display = 'flex';
}

function archivePost() {
  document.getElementById('archive-post').style.display = 'none';
  window.location = "./php/inv_controllers/admin_func/archive_post.php?anID=" + chosenArchivedPost;
}

/*****EDIT USER STUFF BELOW THIS LINE*****/
toggleModView();

var arrMod = document.getElementsByClassName("mod-tag");
var arrIDMod = [];

var arrSub = document.getElementsByClassName("sub-tag");
var arrIDSub = [];

for (var i = 0; i < arrMod.length; i++) {
  arrIDMod.push(arrMod[i].id.split("-")[1]);
}

for (var i = 0; i < arrSub.length; i++) {
  arrIDSub.push(arrSub[i].id.split("-")[1]);
}

//check if user type should be able to edit mods
function toggleModView() {
  var selected_type = document.getElementById("select-type").value;

  if(selected_type == 'student_mod' || selected_type == 'super_admin' || selected_type == 'faculty') {
    document.getElementById("mod-wrapper").style.display = 'initial';
  } else {
    document.getElementById("mod-wrapper").style.display = 'none';
  }
}

//add sub to list
function addSub(e) {
  e.preventDefault();

  var selected_cat_ID = document.getElementById("select-sub").value;
  var selected_cat_name = document.getElementById("select-sub").options[selected_cat_ID-1].innerHTML;
  var display_cat = document.getElementById("sub-" + selected_cat_ID);

  if(display_cat == null) {
    document.getElementById("sub-selected-cat").innerHTML += "<span class='tag subbed' id='sub-" + selected_cat_ID + "' onclick='removeSub(" + selected_cat_ID + ")'>" + selected_cat_name + "</span>";
    arrIDSub.push(selected_cat_ID);
  }
}

//remove sub from list
function removeSub(id) {
  var selected_cat_ID = document.getElementById("sub-" + id);
  selected_cat_ID.parentNode.removeChild(selected_cat_ID);

  var index = arrIDSub.indexOf(id.toString());
  if (index > -1) {
    arrIDSub.splice(index, 1);
  }

  console.log(arrIDSub);
  return false;
}

//add mod cat to list
function addMod(e) {
  e.preventDefault();

  var selected_cat_ID = document.getElementById("select-mod").value;
  var selected_cat_name = document.getElementById("select-mod").options[selected_cat_ID-1].innerHTML;
  var display_cat = document.getElementById("mod-" + selected_cat_ID);

  if(display_cat == null) {
    document.getElementById("mod-selected-cat").innerHTML += "<span class='tag subbed' id='mod-" + selected_cat_ID + "' onclick='removeMod(" + selected_cat_ID + ")'>" + selected_cat_name + "</span>";
    arrIDSub.push(selected_cat_ID);
  }
}

//remove mod cat from list
function removeMod(id) {
  var selected_cat_ID = document.getElementById("mod-" + id);
  selected_cat_ID.parentNode.removeChild(selected_cat_ID);

  var index = arrIDMod.indexOf(id.toString());
  if (index > -1) {
    arrIDMod.splice(index, 1);
  }

  console.log(arrIDMod);
  return false;
}
