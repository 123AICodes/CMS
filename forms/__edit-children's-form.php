<div class="form__container">
  <form action="<?= ROOT_URL ?>logic/edit-children-logic.php" autocomplete="off" class="form" method="post" enctype="multipart/form-data">
    <div class="flex">
      <div class="inputBox">
        <span>Title</span>
        <select class="box" name="title">
          <option value="<?= $child['title'] ?>"><?= $child['title'] ?></option>
          <option value="Sis">Sister</option>
          <option value="Bro">Brother</option>
        </select>
      </div>
      <div class="inputBox">
        <span>Name</span>
        <input type="text" name="name" value="<?= $child['name'] ?>" placeholder="Enter fullname" class="box">
      </div>
    </div>
    <div class="flex">
      <div class="inputBox">
        <span>Residence</span>
        <input type="text" name="residence" value="<?= $child['residence'] ?>" class="box">
      </div>
      <div class="inputBox">
        <span>Mother's Name</span>
        <input type="text" name="mother" value="<?= $child['mother'] ?>" class="box">
      </div>
    </div>
    <div class="flex">
      <div class="inputBox">
        <span>Father's Name</span>
        <input type="text" name="father" value="<?= $child['father'] ?>" class="box">
      </div>
      <div class="inputBox">
        <div class="inputBox">
          <span>Parent's Status</span>
          <select class="box" name="p_status">
            <option value="<?= $child['p_status'] ?>"><?= $child['p_status'] ?></option>
            <option value="Members">Members</option>
            <option value="Not Members">Not Members</option>
          </select>
        </div>
      </div>
    </div>
    <div class="flex">
      <div class="inputBox">
        <span>Contact</span>
        <input type="number" name="contact" value="<?= $child['contact'] ?>" minlength="10" maxlength="10" class="box">
      </div>
      <div class="inputBox">
        <span>Ministry</span>
        <select class="box" name="ministry">
          <option value="Children">Children</option>
          <option value="<?= $child['ministry'] ?>"><?= $child['ministry'] ?></option>
          <option value="Youth">Youth</option>
          <option value="Pemem">Pemem</option>
          <option value="Women">Women</option>
          <option value="Welfare">Welfare</option>
          <option value="Evangelism">Evangelism</option>
        </select>
      </div>
    </div>
    <div class="flex">
      <div class="inputBox">
        <span>Current Status</span>
        <select class="box" name="cur_status">
          <option value="<?= $child['cur_status'] ?>"><?= $child['cur_status'] ?></option>
          <option value="Working">Working</option>
          <option value="Elementary">Elementary</option>
          <option value="Junior High">Junior High</option>
          <option value="Sophomore">Sophomore</option>
        </select>
      </div>
      <div class="inputBox">
        <span>School Name</span>
        <input type="text" name="school" value="<?= $child['school'] ?>" class="box">
      </div>
    </div>
    <div class="flex">
      <div class="inputBox">
        <span>Status</span>
        <select class="box" name="status">
          <option value="<?= $child['status'] ?>"><?= $child['status'] ?></option>
          <option value="Active">Active</option>
          <option value="Normal">Normal</option>
          <option value="InActive">InActive</option>
        </select>
      </div>
      <div class="inputBox">
        <span>Profile</span>
        <input hidden type="text" name="id_number" value="<?= $child['id'] ?>" class="box">
        <input hidden type="text" name="prev_profile" value="<?= $child['profile'] ?>" class="box">
        <input type="file" name="profile" class="box">
      </div>
    </div>
    <button class="submit-btn" name="edit-child">Edit Child</button>
  </form>
</div>