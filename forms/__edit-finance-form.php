<div style="margin-top: 1em;" class="officers__form-container">
  <div class="form__container">
    <form action="<?= ROOT_URL ?>logic/edit-finance-logic.php" autocomplete="off" class="form" method="post">
      <div class="flex">
        <div class="inputBox">
          <span>Type</span>
          <select class="box" name="type">
            <option value="<?= $finance['type'] ?>"><?= $finance['type'] ?></option>
            <option value="Tithes">Tithes</option>
            <option value="Offering">Offering</option>
            <option value="Missions">Missions</option>
          </select>
        </div>
        <div class="inputBox">
          <span>Periods</span>
          <select class="box" name="period">
            <option value="<?= $finance['period'] ?>"><?= $finance['period'] ?></option>
            <option value="Weekly">Weekly</option>
            <option value="Monthly">Monthly</option>
          </select>
        </div>
      </div>
      <div class="flex">
        <div class="inputBox">
          <span>Amount</span>
          <input type="number" step="0.01" name="amount" value="<?= $finance['amount'] ?>" min="0" placeholder="123.00" class="box">
        </div>
        <div class="inputBox">
          <span>Received From</span>
          <input type="text" name="rec_from" value="<?= $finance['rec_from'] ?>" placeholder="received from" class="box">
        </div>
      </div>
      <div class="flex">
        <div class="inputBox">
          <span>Received By</span>
          <input type="text" name="rec_by" value="<?= $finance['rec_by'] ?>" placeholder="received by" class="box">
        </div>
        <div class="inputBox">
          <span>Free Will</span>
          <input type="amount" step="0.01" name="free_will" value="<?= $finance['free_will'] ?>" min="0" placeholder="123.00" class="box">
        </div>
      </div>
      <div class="flex">
        <div class="inputBox">
          <span>Expenses</span>
          <input type="number" step="0.01" name="expenses" value="<?= $finance['expenses'] ?>" min="0" placeholder="123.00" class="box">
        </div>
        <div class="inputBox">
          <span>Purpose</span>
          <input hidden type="text" name="id" value="<?= $finance['id'] ?>" class="box">
          <input type="text" name="purpose" value="<?= $finance['purpose'] ?>" placeholder="purpose" class="box">
        </div>
      </div>
      <button class="submit-btn" name="edit-finance">Edit <?= $finance['type'] ?></button>
    </form>
  </div>
</div>