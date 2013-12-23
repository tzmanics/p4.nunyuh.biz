<div class="forms">
	<form method ='post' action='/posts/p_add'>

	<!-- post information that is mandatory -->
	<h1>CREATE POST</h1><br>
	Post Title : <input required type='text' name='post_title' required type='text'><br><br>
	Description : <textarea required name='post_description' id = 'post_description' required type='text'></textarea>
	<br><br>

	<!-- optional image uploads and captions -->
	Image 1 Link : <input type="text" name="image1" id="image1"><br>
	Image 1 Caption : <input type='text' name='image1_cap'><br>

	Image 2 Link : <input type="text" name="image2" id="image2"><br>
	Image 2 Caption : <input type='text' name='image2_cap'><br>

	Image 3 Link : <input type="text" name="image3" id="image3"><br>
	Image 3 Caption : <input type='text' name='image3_cap'><br>

	Image 4 Link : <input type="text" name="image4" id="image4"><br>
	Image 4 Caption : <input type='text' name='image4_cap'><br>
	<input type = 'Submit' value = 'POST'>
	</form>

	<!-- output divs -->
	<div id='results'>
		look for your images here after you add the link to make sure it's correct before you submit :)</div>
	<div id='resultImage1'>image 1</div>
	<div id='resultImage2'>image 2</div>
	<div id='resultImage3'>image 3</div>
	<div id='resultImage4'>image 4</div>

</div>
