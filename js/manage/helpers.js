function GetFileExtension(filename)
{
	return filename.substr(filename.lastIndexOf(".") + 1);
}

function IsImage(filename)
{
	var fileExtension = GetFileExtension(filename);
	
    switch (fileExtension.toLowerCase())
    {
	case 'jpg':
	case 'jpeg':
	case 'gif':
	case 'bmp':
	case 'png':
		return true;
    }
	return false;
}