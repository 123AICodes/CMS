<div class="form__container">
  <form action="<?= ROOT_URL ?>logic/finance-logic.php" autocomplete="off" class="form" method="post">
    <div class="flex">
      <div class="inputBox">
        <span>Type</span>
        <select class="box" name="type">
          <option value="<?= $type ?>"><?= $type ?></option>
          <option value="Tithes">Tithes</option>
          <option value="Offering">Offering</option>
          <option value="Missions">Missions</option>
        </select>
      </div>
      <div class="inputBox">
        <span>Periods</span>
        <select class="box" name="period">
          <option value="<?= $period ?>"><?= $period ?></option>
          <option value="Weekly">Weekly</option>
          <option value="Monthly">Monthly</option>
        </select>
      </div>
    </div>
    <div class="flex">
      <div class="inputBox">
        <span>Amount</span>
        <input type="number" step="0.01" name="amount" <?= $amount ?> min="0" placeholder="123.00" class="box">
      </div>
      <div class="inputBox">
        <span>Received From</span>
        <input type="text" name="rec_from" <?= $rec_from ?> placeholder="received from" class="box">
      </div>
    </div>
    <div class="flex">
      <div class="inputBox">
        <span>Received By</span>
        <input type="text" name="rec_by" <?= $rec_by ?> placeholder="received by" class="box">
      </div>
      <div class="inputBox">
        <span>Free Will</span>
        <input type="amount" step="0.01" name="free_will" <?= $free_will ?> min="0" placeholder="123.00" class="box">
      </div>
    </div>
    <div class="flex">
      <div class="inputBox">
        <span>Expenses</span>
        <input type="number" step="0.01" name="expenses" <?= $expenses ?> min="0" placeholder="123.00" class="box">
      </div>
      <div class="inputBox">
        <span>Purpose</span>
        <input type="text" name="purpose" <?= $purpose ?> placeholder="purpose" class="box">
      </div>
    </div>
    <button class="submit-btn" name="add-finance">Add New Data</button>
  </form>
</div>