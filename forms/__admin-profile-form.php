 <!-- admin form -->
 <div class="admin-form-container">
   <h4 class="h4">User Settings</h4>
   <div class="form-container">
     <form action="<?= ROOT_URL ?>logic/admin-details-profile-logic.php" method="post" autocomplete="off" class="form">
       <div class="flex">
         <div class="inputBox">
           <span>Title</span>
           <input type="text" name="title" placeholder="<?= $user['title'] ?>" class="box">
         </div>
         <div class="inputBox">
           <span>Name</span>
           <input type="text" name="name" placeholder="<?= $user['name'] ?>" class="box">
         </div>
       </div>
       <div class="flex">
         <div class="inputBox">
           <span>Username</span>
           <input type="text" name="username" placeholder="<?= $user['username'] ?>" class="box">
         </div>
       </div>
       <div class="flex">
         <div class="inputBox">
           <span>Email</span>
           <input type="email" name="email" placeholder="<?= $user['email'] ?>" class="box">
         </div>
         <div class="inputBox">
           <span>Contact</span>
           <input type="number" name="contact" placeholder="<?= $user['contact'] ?>" minlength="10" maxlength="10" class="box">
         </div>
         <div hidden class="inputBox">
           <input type="text" name="id" value="<?= $user['id'] ?>" class="box">
         </div>
       </div>
       <button class="btn-save" name="save-settings">Save Settings</button>
     </form>
   </div>
 </div>