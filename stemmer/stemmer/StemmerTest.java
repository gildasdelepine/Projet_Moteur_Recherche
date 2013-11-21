
import org.tartarus.snowball.*;
import java.lang.reflect.Method;
import java.io.FileReader;
import java.io.Reader;
import java.io.Writer;
import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.FileInputStream;
import java.io.InputStreamReader;
import java.io.OutputStreamWriter;
import java.io.OutputStream;
import java.io.FileOutputStream;
import java.util.Hashtable;
import java.util.Vector;

public class StemmerTest {

	Hashtable<String,Integer> hash;
	SnowballProgram stemmer = null;
	Method stemMethod = null;
	StringBuffer input = null;
	Object [] emptyArgs = null;
	
   	public StemmerTest() {
	
		/* Charge l'Anti-dictionnaire */
		
		BufferedReader reader = null;
		String line;
		hash = new Hashtable<String,Integer>(1000);
		int i=0;
		try {
			reader = new BufferedReader(new FileReader("stopwords"));
		
			while ((line = reader.readLine()) != null) {
				hash.put(new String(line), new Integer(i++));
			}
			reader.close();
		}
		catch(Exception e) {
			System.out.println("Erreur lecture stopwords");
		}
				
		/* Charge le stemmer */
	
		try {
			Class stemClass = Class.forName("org.tartarus.snowball.ext.englishStemmer");
			stemmer = (SnowballProgram) stemClass.newInstance();
			stemMethod = stemClass.getMethod("stem", new Class[0]);
		} catch (Exception e) {
			e.printStackTrace();
		}
		
		input = new StringBuffer();
		emptyArgs = new Object[0];
	}
	
	public Vector process(String _string) {
		int character;
		Vector<String> vector = new Vector<String>();
		for (int i=0; i<_string.length(); i++) {
			char ch = _string.charAt(i);
			if (Character.isWhitespace((char) ch)) {
				if (input.length() > 0) {
					if (!hash.containsKey(input.toString())) {
						stemmer.setCurrent(input.toString());
						try {
							stemMethod.invoke(stemmer, emptyArgs);
						} catch (Exception e) {
							e.printStackTrace();
						}
						vector.add(new String(stemmer.getCurrent()));
					}
					input.delete(0, input.length());
				}
			} else {
			  input.append(Character.toLowerCase(ch));
			}
		}
		return vector;
	}
	
	 public static void main(String [] args) throws Throwable {
		StemmerTest stemmer = new StemmerTest();
		Vector v = stemmer.process("ceci est une chaine de caracteres\n");
		
		for(int i=0; i < v.size(); i++)
		if(v.elementAt(i) != null) System.out.println("" + v.elementAt(i));
	}


}
