<script type="text/javascript" src="https://cdn.tiny.cloud/1/bmlmb5p14dr85225jial6a2am0m0m3vihfyzrbkwbe9n2mnf/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
<script>
// tinymce loader
tinymce.init({
	selector: 'textarea',
	plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage advtemplate ai mentions tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss markdown',
	toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
	tinycomments_mode: 'embedded',
	tinycomments_author: 'Author name',
	mergetags_list: [
		{ value: 'First.Name', title: 'First Name' },
		{ value: 'Email', title: 'Email' },
	],
	ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
});
</script>

</head>  
<body class="bg-body">
	
	<h2>Edit News</h2>

    <!-- Display validation errors -->
    <?php echo validation_errors(); ?>

	<?php if ($this->session->userdata("name") === Null):
			redirect(base_url(''));	
	elseif ($this->session->userdata("name") === 'Alpha'):?>
		<a href="<?php echo base_url(''); ?>">Home</a>
		<a href="<?php echo base_url('home'); ?>">Dashboard</a>
		<a href="<?php echo base_url('register/add'); ?>">Add User</a>
		<a href="<?php echo base_url('news/add'); ?>">Add News</a>
		<a href="<?php echo base_url('login/logout'); ?>">Logout</a>
	<?php else: ?>
		<a href="<?php echo base_url(''); ?>">Home</a>
		<a href="<?php echo base_url('home'); ?>">Dashboard</a>
		<a href="<?php echo base_url('news/add'); ?>">Add News</a>
		<a href="<?php echo base_url('login/logout'); ?>">Logout</a>
	<?php endif; ?>

    <!-- form action style for editing a user -->
    <form action="<?php echo base_url('news/edit/' . $news->id); ?>" method="post">
        <table>
            <tr>
                <td>Title</td>
                <td><input type="text" name="title" value="<?php echo set_value('title', $news->title); ?>"></td>
            </tr>
            <tr>
                <td>Text</td>
                <td><textarea name="text"><?php echo set_value('text', $news->text); ?></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Save Edit"></td>
            </tr>
        </table>
    </form>
	
</body>
</html>
