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