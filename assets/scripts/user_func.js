//General user functions (accessible to all)

//remove category from user subscription
function delUserCategory(catID) {
  window.location = "./php/inv_controllers/user_func/del_user_category.php?catID=" + catID;
}


//adds category to users subscription
function addUserCategory(catID) {
  window.location = "./php/inv_controllers/user_func/add_user_category.php?catID=" + catID;
}