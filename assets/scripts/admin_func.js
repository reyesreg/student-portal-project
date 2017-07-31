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

//Create user