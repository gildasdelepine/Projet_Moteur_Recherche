import java.io.*;
import org.blinkenlights.jid3.*;
import org.blinkenlights.jid3.v1.*;
import org.blinkenlights.jid3.v2.*;

public class Jid3Test {
	
	public Jid3Test(String name) {
        File file = new File(name);
        MediaFile mediafile = new MP3File(file);
		
		try {
			ID3V2_3_0Tag v23_tag = (ID3V2_3_0Tag) mediafile.getID3V2Tag();
        
			System.out.println("Number = " + v23_tag.getTrackNumber());
			System.out.println("Title = " + v23_tag.getTitle());
			System.out.println("Album = " + v23_tag.getAlbum()); 
        	System.out.println("Genre = " + v23_tag.getGenre()); 
        	System.out.println("Year = " + v23_tag.getYear()); 
		} catch (Exception e) {
			e.printStackTrace();
		}
    }
	
	 public static void main(String[] args) throws Exception {
		new Jid3Test(args[0]);
	 }
}