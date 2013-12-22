<div class="forms">
	<form method ='post' action='/posts/p_add'>
	<h1>CREATE POST</h1><br>
	Post Title <input type='text' name='post_title'><br><br>
	Description<textarea name = 'post_description' id = 'post_description'></textarea>
	<br><br>

	<label for="image1">Image 1:</label>
	Image Link<input type="text" name="image1" id="image1"><br>
	Image Caption<input type='text' name='image1_cap'><br>

	Image Link<input type="text" name="image2" id="image2"><br>
	Image Caption<input type='text' name='image2_cap'><br>

	Image Link<input type="text" name="image3" id="image3"><br>
	Image Caption<input type='text' name='image3_cap'><br>

	Image Link<input type="text" name="image4" id="image4"><br>
	Image Caption<input type='text' name='image4_cap'><br>
	<input type = 'Submit' value = 'POST'>
	</form>
</div>
<div id='results'></div>
