<div class="form__container">
  <form action="<?= ROOT_URL ?>logic/edit-youth-logic.php" autocomplete="off" class="form" method="post" enctype="multipart/form-data">
    <div class="flex">
      <div class="inputBox">
        <span>Title</span>
        <select class="box" name="title">
          <option value="<?= $youth['title'] ?>"><?= $youth['title'] ?></option>
          <option value="Sis">Sister</option>
          <option value="Bro">Brother</option>
        </select>
      </div>
      <div class="inputBox">
        <span>Name</span>
        <input type="text" name="name" value="<?= $youth['name'] ?>" placeholder="enter fullname" class="box">
      </div>
    </div>
    <div class="flex">
      <div class="inputBox">
        <span>Marital Status</span>
        <select class="box" name="marital_status">
          <option value="<?= $youth['marital_status'] ?>"><?= $youth['marital_status'] ?></option>
          <option value="Maried">Maried</option>
          <option value="Spinster">Spinster</option>
          <option value="Bachelor">Bachelor</option>
        </select>
      </div>
      <div class="inputBox">
        <span>Residence</span>
        <input type="text" name="residence" value="<?= $youth['residence'] ?>" placeholder="enter residence" class="box">
      </div>
    </div>
    <div class="flex">
      <div class="inputBox">
        <span>Group</span>
        <select class="box" name="group">
          <option value="<?= $youth['group_name'] ?>"><?= $youth['group_name'] ?></option>
          <option value="Luke">Luke</option>
          <option value="Mark">Mark</option>
          <option value="John">John</option>
          <option value="James">James</option>
          <option value="Matthew">Matthew</option>
        </select>
      </div>
      <div class="inputBox">
        <span>Email Address</span>
        <input type="email" name="email" value="<?= $youth['email'] ?>" placeholder="email address" class="box">
      </div>
    </div>
    <div class="flex">
      <div class="inputBox">
        <span>Contact</span>
        <input type="number" name="contact" value="<?= $youth['contact'] ?>" placeholder="0244566788" minlength="10" maxlength="10" class="box">
      </div>
      <div class="inputBox">
        <span>Ministry</span>
        <select class="box" name="ministry">
          <option value="<?= $youth['ministry'] ?>"><?= $youth['ministry'] ?></option>
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
        <span>Current Status</span>
        <select class="box" name="current_status">
          <option value="<?= $youth['current_status'] ?>"><?= $youth['current_status'] ?></option>
          <option value="Graduate">Graduate</option>
          <option value="Employee">Employee</option>
          <option value="Sophomore">Sophomore</option>
          <option value="UnEmployed">UnEmployed</option>
          <option value="Enterprenuer">Enterprenuer</option>
          <option value="Undergraduate">Undergraduate</option>
        </select>
      </div>
      <div class="inputBox">
        <span>School Name</span>
        <input type="text" name="school" value="<?= $youth['school'] ?>" placeholder="enter school" class="box">
      </div>
    </div>
    <div class="flex">
      <div class="inputBox">
        <span>Status</span>
        <select class="box" name="status">
          <option value="<?= $youth['status'] ?>"><?= $youth['status'] ?></option>
          <option value="Active">Active</option>
          <option value="Normal">Normal</option>
          <option value="InActive">InActive</option>
        </select>
      </div>
      <div class="inputBox">
        <span>Youth Type</span>
        <select class="box" name="youth_type">
          <option value="<?= $youth['youth_type'] ?>"><?= $youth['youth_type'] ?></option>
          <option value="Teenager">Teenager</option>
          <option value="Young Adult">Young Adult</option>
        </select>
      </div>
      <div class="inputBox">
        <span>Profile</span>
        <input hidden type="text" name="id_number" value="<?= $youth['id'] ?>" placeholder="enter school" class="box">
        <input hidden type="text" name="prev_profile" value="<?= $youth['profile'] ?>" placeholder="enter school" class="box">
        <input type="file" name="profile" class="box">
      </div>
    </div>
    <button class="submit-btn" name="edit-youth">Edit Youth</button>
  </form>
</div>