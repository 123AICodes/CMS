 <!-- officers error message -->
 <?php if (isset($_SESSION['add-officer'])) : ?>
   <div class="empty-box error">
     <p>
       <?php
        echo $_SESSION['add-officer'];
        unset($_SESSION['add-officer']);
        ?>
     </p>
     <button class="msg-btn" onclick="this.parentElement.remove()"><i class="fa fa-close"></i></button>
   </div>
 <?php elseif (isset($_SESSION['add-officer-success'])) : ?>
   <div class="empty-box success">
     <p>
       <?php
        echo $_SESSION['add-officer-success'];
        unset($_SESSION['add-officer-success']);
        ?>
     </p>
     <button class="msg-btn" onclick="this.parentElement.remove()"><i class="fa fa-close"></i></button>
   </div>

   <!-- edit officers -->
 <?php elseif (isset($_SESSION['edit-officer'])) : ?>
   <div class="empty-box error">
     <p>
       <?php
        echo $_SESSION['edit-officer'];
        unset($_SESSION['edit-officer']);
        ?>
     </p>
     <button class="msg-btn" onclick="this.parentElement.remove()"><i class="fa fa-close"></i></button>
   </div>

 <?php elseif (isset($_SESSION['edit-officer-success'])) : ?>
   <div class="empty-box success">
     <p>
       <?php
        echo $_SESSION['edit-officer-success'];
        unset($_SESSION['edit-officer-success']);
        ?>
     </p>
     <button class="msg-btn" onclick="this.parentElement.remove()"><i class="fa fa-close"></i></button>
   </div>

   <!-- delete officers -->
 <?php elseif (isset($_SESSION['delete-officer'])) : ?>
   <div class="empty-box error">
     <p>
       <?php
        echo $_SESSION['delete-officer'];
        unset($_SESSION['delete-officer']);
        ?>
     </p>
     <button class="msg-btn" onclick="this.parentElement.remove()"><i class="fa fa-close"></i></button>
   </div>

 <?php elseif (isset($_SESSION['delete-officer-success'])) : ?>
   <div class="empty-box success">
     <p>
       <?php
        echo $_SESSION['delete-officer-success'];
        unset($_SESSION['delete-officer-success']);
        ?>
     </p>
     <button class="msg-btn" onclick="this.parentElement.remove()"><i class="fa fa-close"></i></button>
   </div>

   <!-- members error message -->
 <?php elseif (isset($_SESSION['add-member'])) : ?>
   <div class="empty-box error">
     <p>
       <?php
        echo $_SESSION['add-member'];
        unset($_SESSION['add-member']);
        ?>
     </p>
     <button class="msg-btn" onclick="this.parentElement.remove()"><i class="fa fa-close"></i></button>
   </div>
 <?php elseif (isset($_SESSION['add-member-success'])) : ?>
   <div class="empty-box success">
     <p>
       <?php
        echo $_SESSION['add-member-success'];
        unset($_SESSION['add-member-success']);
        ?>
     </p>
     <button class="msg-btn" onclick="this.parentElement.remove()"><i class="fa fa-close"></i></button>
   </div>

   <!-- edit members error message -->
 <?php elseif (isset($_SESSION['edit-member'])) : ?>
   <div class="empty-box error">
     <p>
       <?php
        echo $_SESSION['edit-member'];
        unset($_SESSION['edit-member']);
        ?>
     </p>
     <button class="msg-btn" onclick="this.parentElement.remove()"><i class="fa fa-close"></i></button>
   </div>
 <?php elseif (isset($_SESSION['edit-member-success'])) : ?>
   <div class="empty-box success">
     <p>
       <?php
        echo $_SESSION['edit-member-success'];
        unset($_SESSION['edit-member-success']);
        ?>
     </p>
     <button class="msg-btn" onclick="this.parentElement.remove()"><i class="fa fa-close"></i></button>
   </div>

   <!-- delete members error message -->
 <?php elseif (isset($_SESSION['delete-member'])) : ?>
   <div class="empty-box error">
     <p>
       <?php
        echo $_SESSION['delete-member'];
        unset($_SESSION['delete-member']);
        ?>
     </p>
     <button class="msg-btn" onclick="this.parentElement.remove()"><i class="fa fa-close"></i></button>
   </div>
 <?php elseif (isset($_SESSION['delete-member-success'])) : ?>
   <div class="empty-box success">
     <p>
       <?php
        echo $_SESSION['delete-member-success'];
        unset($_SESSION['delete-member-success']);
        ?>
     </p>
     <button class="msg-btn" onclick="this.parentElement.remove()"><i class="fa fa-close"></i></button>
   </div>

   <!-- youth error message -->
 <?php elseif (isset($_SESSION['add-youth'])) : ?>
   <div class="empty-box error">
     <p>
       <?php
        echo $_SESSION['add-youth'];
        unset($_SESSION['add-youth']);
        ?>
     </p>
     <button class="msg-btn" onclick="this.parentElement.remove()"><i class="fa fa-close"></i></button>
   </div>
 <?php elseif (isset($_SESSION['add-youth-success'])) : ?>
   <div class="empty-box success">
     <p>
       <?php
        echo $_SESSION['add-youth-success'];
        unset($_SESSION['add-youth-success']);
        ?>
     </p>
     <button class="msg-btn" onclick="this.parentElement.remove()"><i class="fa fa-close"></i></button>
   </div>

   <!-- delete youth error message -->
 <?php elseif (isset($_SESSION['delete-youth'])) : ?>
   <div class="empty-box error">
     <p>
       <?php
        echo $_SESSION['delete-youth'];
        unset($_SESSION['delete-youth']);
        ?>
     </p>
     <button class="msg-btn" onclick="this.parentElement.remove()"><i class="fa fa-close"></i></button>
   </div>
 <?php elseif (isset($_SESSION['delete-youth-success'])) : ?>
   <div class="empty-box success">
     <p>
       <?php
        echo $_SESSION['delete-youth-success'];
        unset($_SESSION['delete-youth-success']);
        ?>
     </p>
     <button class="msg-btn" onclick="this.parentElement.remove()"><i class="fa fa-close"></i></button>
   </div>

   <!-- edit youth error message -->
 <?php elseif (isset($_SESSION['edit-youth'])) : ?>
   <div class="empty-box error">
     <p>
       <?php
        echo $_SESSION['edit-youth'];
        unset($_SESSION['edit-youth']);
        ?>
     </p>
     <button class="msg-btn" onclick="this.parentElement.remove()"><i class="fa fa-close"></i></button>
   </div>
 <?php elseif (isset($_SESSION['edit-youth-success'])) : ?>
   <div class="empty-box success">
     <p>
       <?php
        echo $_SESSION['edit-youth-success'];
        unset($_SESSION['edit-youth-success']);
        ?>
     </p>
     <button class="msg-btn" onclick="this.parentElement.remove()"><i class="fa fa-close"></i></button>
   </div>

   <!-- children error message -->
 <?php elseif (isset($_SESSION['add-child'])) : ?>
   <div class="empty-box error">
     <p>
       <?php
        echo $_SESSION['add-child'];
        unset($_SESSION['add-child']);
        ?>
     </p>
     <button class="msg-btn" onclick="this.parentElement.remove()"><i class="fa fa-close"></i></button>
   </div>
 <?php elseif (isset($_SESSION['add-child-success'])) : ?>
   <div class="empty-box success">
     <p>
       <?php
        echo $_SESSION['add-child-success'];
        unset($_SESSION['add-child-success']);
        ?>
     </p>
     <button class="msg-btn" onclick="this.parentElement.remove()"><i class="fa fa-close"></i></button>
   </div>

   <!-- edit children error message -->
 <?php elseif (isset($_SESSION['edit-child'])) : ?>
   <div class="empty-box error">
     <p>
       <?php
        echo $_SESSION['edit-child'];
        unset($_SESSION['edit-child']);
        ?>
     </p>
     <button class="msg-btn" onclick="this.parentElement.remove()"><i class="fa fa-close"></i></button>
   </div>
 <?php elseif (isset($_SESSION['edit-child-success'])) : ?>
   <div class="empty-box success">
     <p>
       <?php
        echo $_SESSION['edit-child-success'];
        unset($_SESSION['edit-child-success']);
        ?>
     </p>
     <button class="msg-btn" onclick="this.parentElement.remove()"><i class="fa fa-close"></i></button>
   </div>

   <!-- delete children error message -->
 <?php elseif (isset($_SESSION['delete-child'])) : ?>
   <div class="empty-box error">
     <p>
       <?php
        echo $_SESSION['delete-child'];
        unset($_SESSION['delete-child']);
        ?>
     </p>
     <button class="msg-btn" onclick="this.parentElement.remove()"><i class="fa fa-close"></i></button>
   </div>
 <?php elseif (isset($_SESSION['delete-child-success'])) : ?>
   <div class="empty-box success">
     <p>
       <?php
        echo $_SESSION['delete-child-success'];
        unset($_SESSION['delete-child-success']);
        ?>
     </p>
     <button class="msg-btn" onclick="this.parentElement.remove()"><i class="fa fa-close"></i></button>
   </div>

   <!-- finance error message -->
 <?php elseif (isset($_SESSION['add-finance'])) : ?>
   <div class="empty-box error">
     <p>
       <?php
        echo $_SESSION['add-finance'];
        unset($_SESSION['add-finance']);
        ?>
     </p>
     <button class="msg-btn" onclick="this.parentElement.remove()"><i class="fa fa-close"></i></button>
   </div>
 <?php elseif (isset($_SESSION['add-finance-success'])) : ?>
   <div class="empty-box success">
     <p>
       <?php
        echo $_SESSION['add-finance-success'];
        unset($_SESSION['add-finance-success']);
        ?>
     </p>
     <button class="msg-btn" onclick="this.parentElement.remove()"><i class="fa fa-close"></i></button>
   </div>

   <!-- edit finance error message -->
 <?php elseif (isset($_SESSION['edit-finance'])) : ?>
   <div class="empty-box error">
     <p>
       <?php
        echo $_SESSION['edit-finance'];
        unset($_SESSION['edit-finance']);
        ?>
     </p>
     <button class="msg-btn" onclick="this.parentElement.remove()"><i class="fa fa-close"></i></button>
   </div>
 <?php elseif (isset($_SESSION['edit-finance-success'])) : ?>
   <div class="empty-box success">
     <p>
       <?php
        echo $_SESSION['edit-finance-success'];
        unset($_SESSION['edit-finance-success']);
        ?>
     </p>
     <button class="msg-btn" onclick="this.parentElement.remove()"><i class="fa fa-close"></i></button>
   </div>

   <!-- delete finance error message -->
 <?php elseif (isset($_SESSION['delete-finance'])) : ?>
   <div class="empty-box error">
     <p>
       <?php
        echo $_SESSION['delete-finance'];
        unset($_SESSION['delete-finance']);
        ?>
     </p>
     <button class="msg-btn" onclick="this.parentElement.remove()"><i class="fa fa-close"></i></button>
   </div>
 <?php elseif (isset($_SESSION['delete-finance-success'])) : ?>
   <div class="empty-box success">
     <p>
       <?php
        echo $_SESSION['delete-finance-success'];
        unset($_SESSION['delete-finance-success']);
        ?>
     </p>
     <button class="msg-btn" onclick="this.parentElement.remove()"><i class="fa fa-close"></i></button>
   </div>
 <?php endif ?>