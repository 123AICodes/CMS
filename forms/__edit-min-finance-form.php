<div class="form__container">
  <form action="<?= ROOT_URL ?>logic/edit-min-finance-logic.php" autocomplete="off" class="form" method="post">
    <div class="flex">
      <div class="inputBox">
        <span>Ministry</span>
        <select class="box" name="ministry">
          <option value="<?= $finance['ministry'] ?>"><?= $finance['ministry'] ?></option>
          <option value="Youth">Youth</option>
          <option value="Pemem">Pemem</option>
          <option value="Women">Women</option>
          <option value="Welfare">Welfare</option>
          <option value="Children">Children</option>
          <option value="Evangelism">Evangelism</option>
        </select>
      </div>
      <div class="inputBox">
        <span>Amount</span>
        <input type="number" step="0.01" name="amount" value="<?= $finance['amount'] ?>" min="0" placeholder="123.00" class="box">
      </div>
    </div>
    <div class="flex">
      <div class="inputBox">
        <span>Received From</span>
        <input type="text" name="rec_from" value="<?= $finance['rec_from'] ?>" placeholder="received from" class="box">
      </div>
      <div class="inputBox">
        <span>Received By</span>
        <input type="text" name="rec_by" value="<?= $finance['rec_by'] ?>" placeholder="received by" class="box">
      </div>
    </div>
    <div class="flex">
      <div class="inputBox">
        <span>Expenses</span>
        <input type="number" step="0.01" name="expenses" value="<?= $finance['expenses'] ?>" min="0" placeholder="123.00" class="box">
      </div>
      <div class="inputBox">
        <span>Purpose</span>
        <input hidden type="text" name="id" value="<?= $finance['id'] ?>" placeholder="purpose" class="box">
        <input type="text" name="purpose" value="<?= $finance['purpose'] ?>" placeholder="purpose" class="box">
      </div>
    </div>
    <button class="submit-btn" name="edit-finance">Edit <?= $finance['ministry'] ?>'s Finance</button>
  </form>
</div>