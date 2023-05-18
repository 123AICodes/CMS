<div class="form__container">
  <form action="<?= ROOT_URL ?>logic/edit-member-logic.php" autocomplete="off" class="form" method="post" enctype="multipart/form-data">
    <div class="flex">
      <div class="inputBox">
        <span>Title</span>
        <select class="box" name="title">
          <option value="<?= $member['title'] ?>"><?= $member['title'] ?></option>
          <option value="Eno">Eno</option>
          <option value="Agya">Agya</option>
          <option value="Sis">Sister</option>
          <option value="Bro">Brother</option>
        </select>
      </div>
      <div class="inputBox">
        <span>Name</span>
        <input type="text" name="name" value="<?= $member['name'] ?>" placeholder="enter fullname" class="box">
      </div>
    </div>
    <div class="flex">
      <div class="inputBox">
        <span>Marital Status</span>
        <select class="box" name="marital_status">
          <option value="<?= $member['marital_status'] ?>"><?= $member['marital_status'] ?></option>
          <option value="Maried">Maried</option>
          <option value="Widow">Widow</option>
          <option value="Not Maried">Not Maried</option>
        </select>
      </div>
      <div class="inputBox">
        <span>Residence</span>
        <input type="text" name="residence" value="<?= $member['residence'] ?>" placeholder="enter residence" class="box">
      </div>
    </div>
    <div class="flex">
      <div class="inputBox">
        <span>Group</span>
        <select class="box" name="group">
          <option value="<?= $member['group_name'] ?>"><?= $member['group_name'] ?></option>
          <option value="Luke">Luke</option>
          <option value="Mark">Mark</option>
          <option value="John">John</option>
          <option value="James">James</option>
          <option value="Matthew">Matthew</option>
        </select>
      </div>
      <div class="inputBox">
        <span>Email Address</span>
        <input type="email" name="email" value="<?= $member['email'] ?>" placeholder="email address" class="box">
      </div>
    </div>
    <div class="flex">
      <div class="inputBox">
        <span>Contact</span>
        <input type="number" name="contact" value="<?= $member['contact'] ?>" placeholder="0244566788" minlength="10" maxlength="10" class="box">
      </div>
      <div class="inputBox">
        <span>Ministry</span>
        <select class="box" name="ministry">
          <option value="<?= $member['ministry'] ?>"><?= $member['ministry'] ?></option>
          <option value="Youth">Youth</option>
          <option value="Pemem">Pemem</option>
          <option value="Women">Women</option>
          <option value="Welfare">Welfare</option>
          <option value="Children">Children</option>
          <option value="Evangelism">Evangelism</option>
        </select>
      </div>
    </div>
    <div class="flex">
      <div class="inputBox">
        <span>Status</span>
        <select class="box" name="status">
          <option value="<?= $member['status'] ?>"><?= $member['status'] ?></option>
          <option value="Active">Active</option>
          <option value="Normal">Normal</option>
          <option value="InActive">InActive</option>
        </select>
      </div>
      <div class="inputBox">
        <span>Profile</span>
        <input hidden type="text" name="id_number" value="<?= $member['id'] ?>" placeholder="email address" class="box">
        <input hidden type="text" name="prev_profile" value="<?= $member['profile'] ?>" placeholder="email address" class="box">
        <input type="file" name="profile" class="box">
      </div>
    </div>
    <button class="submit-btn" name="edit-member">Edit Member</button>
  </form>
</div>