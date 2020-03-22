<div class="card">
	<div class="card-body">
	<div class="card-title"><h5>นำเข้าสินค้า</h5></div>
		<form action="../../control/stock/EditPro.php" method="POST">
		<div class="modal-body">
				<div class="form-group">									
					<select name="pid" class="form-control">
						<?php while($result = mysqli_fetch_array($query,MYSQLI_ASSOC)){ ?>	
  					<option name="pid" value="<?php echo $result["P_id"]; ?>"><?php echo $result["P_id"]." - ".$result["P_name"] ?></option>
						<?php } ?>
					</select>		
				</div>
				<div class="form-group">
					<label>จำนวน</label>
					<input type="number"  name="amount" id="amount" class="form-control" min="0" pattern="[1234567890]{7}" title="ตัวเลขเท่านั้น" required>
				</div>
				<div class="form-group">
					<label>ราคาต่อหน่วย</label>
					<input type="number" name="price" id="price" class="form-control" min="0"  pattern="[1234567890]{7}" title="ตัวเลขเท่านั้น" required></input>
				</div>
			</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-success" value="Save Change">
					</div>

</form>
	</div>
</div>