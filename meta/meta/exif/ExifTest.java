
import java.io.File;
import com.drew.metadata.Metadata;
import com.drew.metadata.Directory;
import com.drew.metadata.exif.ExifDirectory;
import com.drew.metadata.jpeg.JpegDirectory;
import com.drew.imaging.jpeg.JpegMetadataReader;

public class ExifTest
{
    public ExifTest(String fileName)
    {
        File jpegFile = new File(fileName);

        try {
            Metadata metadata = JpegMetadataReader.readMetadata(jpegFile);
            printImageTags(metadata);
        } catch (Exception e) {
            System.err.println("Error reading Jpeg !");
        }
    }
	
	private void printImageTags(Metadata metadata)
    {
	
		Directory d_jpeg = metadata.getDirectory(JpegDirectory.class);
		System.out.println("Width = " + d_jpeg.getString(JpegDirectory.TAG_JPEG_IMAGE_WIDTH));
		System.out.println("Height = " + d_jpeg.getString(JpegDirectory.TAG_JPEG_IMAGE_HEIGHT));
		
		Directory d_exif = metadata.getDirectory(ExifDirectory.class);
        System.out.println("Date = " + d_exif.getString(ExifDirectory.TAG_DATETIME));
	}

    public static void main(String[] args) {
		new ExifTest(args[0]);
    }
}
