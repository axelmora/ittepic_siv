<html>
<head>
<title>Upload Form</title>
</head>
<body>

<?php echo $error;?>

<?php echo form_open_multipart('adjuntar_descargar/do_upload');?>

<input type="file" accept=".pdf,.docx,.doc" name="userfile" />

<br /><br />

<input type="submit" value="upload" />

</form>

<a href="<?php echo base_url() . "index.php/adjuntar_descargar/download"?>">Descargar</a>

</body>
</html>