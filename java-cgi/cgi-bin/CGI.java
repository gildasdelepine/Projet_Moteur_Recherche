import java.util.Hashtable;
import java.util.StringTokenizer;
import java.io.DataInputStream;
import java.io.DataInput;
import java.io.IOException;

class CGI {

	static Hashtable<String, String> ReadParams() {
		Hashtable<String, String> parametres = new Hashtable<String, String>();

		String inBuffer = "";
		if (MethGet()) {
			inBuffer = System.getProperty("cgi.query_string");
		} else {
			DataInput d = new DataInputStream(System.in);
			String line;
			try {
				while((line = d.readLine()) != null) {
					inBuffer = inBuffer + line;
				}
			} catch (Exception e) { 
				e.printStackTrace();
			}
		}

		//
		//  Decoupage en couples couples nom-valeur separes par '&'
		//
		StringTokenizer pair_tokenizer = new StringTokenizer(inBuffer,"&");

		while (pair_tokenizer.hasMoreTokens()) {
			String pair = urlDecode(pair_tokenizer.nextToken());
			//
			// Decoupage nom valeur separe par '='
			//
			StringTokenizer keyval_tokenizer = new StringTokenizer(pair,"=");
			String key = new String();
			String value = new String();
			if (keyval_tokenizer.hasMoreTokens())
				key = keyval_tokenizer.nextToken();
			if (keyval_tokenizer.hasMoreTokens())
				value = keyval_tokenizer.nextToken();
			//
			// Ajout du couple nom, valeur a la table de hachage pour une recherche rapide
			//
			parametres.put(key,value);
		}

		return parametres;
	}

	public static boolean MethGet() {
		String RequestMethod = System.getProperty("cgi.request_method");
		boolean returnVal = false;

		if (RequestMethod != null) {
			if (RequestMethod.equals("GET") ||
					RequestMethod.equals("get"))
			{
				returnVal=true;
			}
		}
		return returnVal;
	}



	/**
	 *
	 * URL decode a string.<p>
	 *
	 * Data passed through the CGI API is URL encoded by the browser.
	 * All spaces are turned into plus characters (+) and all "special"
	 * characters are hex escaped into a %dd format (where dd is the hex
	 * ASCII value that represents the original character).  You probably
	 * won't ever need to call this routine directly; it is used by the
	 * ReadParse method to decode the form data.
	 *
	 * @param in The string you wish to decode.
	 *
	 * @return The decoded string.
	 *
	 */

	public static String urlDecode(String in)
	{
		StringBuffer out = new StringBuffer(in.length());
		int i = 0;
		int j = 0;

		while (i < in.length())
		{
			char ch = in.charAt(i);
			i++;
			if (ch == '+') ch = ' ';
			else if (ch == '%')
			{
				ch = (char)Integer.parseInt(in.substring(i,i+2), 16);
				i+=2;
			}
			out.append(ch);
			j++;
		}
		return new String(out);
	}

}
