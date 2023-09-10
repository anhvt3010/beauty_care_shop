	
<style>
	.form-label { width: 20%; float: left; text-align:center; margin: 5px 0px}
	.form-control { width: 70%; float: left; margin: 5px 0px; text-align: center;}
	.btn section  { width: 30%; }
</style>
<section class="d-grid gap-2" >
	<h2 class="btn btn-danger" >Sign in Admin</h2>
    	<section style="color: red; text-transform: bold; text-align:center; font-size: 30px;"><?=isset($alert)?$alert:""?></section>
    	<form method="post" style="width: 70%; text-align: center; margin:  0px 20%">
	        <section >
	            <label class="form-label">Adminname: </label><input class="form-control" type="text" name="user" required>
	        </section>
	        <br>
	        <section>
	            <label class="form-label" >Password: </label><input class="form-control" type="password" name="pass" required>
	        </section>
	        <br>
	        <section class="btn">
	            <input type="submit" value="Sign in" class="btn btn-info" >
	        </section>
    </form>
</section>
