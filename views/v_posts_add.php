<form method ='post' enctype='multipart/form-data' action='/posts/p_add'>
	<h1><label for = 'content'>CREATE POST:</label><br></h1>
	Post Title <input type='text' name='post_title'><br><br>
	Short Description <input type='text' name='shortDescrip'><br><br>
	Long Description<textarea name = 'longDescrip' id = 'longDescrip'></textarea>
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
<BR>
<div id='results'></div>
