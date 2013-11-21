import java.util.Hashtable;
import java.util.Date;

public class Form {
	String content_length;
	String request_method;
	String query_string;
	String server_name;
	String server_port;
	String script_name;
	String path_info;
	
	Hashtable<String, String> Hparams;
	
	
	public Form() {
		
		content_length = System.getProperty("cgi.content_length");
		request_method = System.getProperty("cgi.request_method");
		query_string = System.getProperty("cgi.query_string");
		server_name = System.getProperty("cgi.server_name");
		server_port = System.getProperty("cgi.server_port");
		script_name = System.getProperty("cgi.script_name");
		path_info = System.getProperty("cgi.path_info");
		
		Hparams = CGI.ReadParams();
		
		String nom = Hparams.get("nom");
		String prenom = Hparams.get("prenom");
		
		System.out.println("<html><body>");
		System.out.println("<h2>Nom : "+nom+"</h2>");
		System.out.println("<h2>Prenom : "+prenom+"</h2>");
		System.out.println("</body></html>");
	}
	
	public static void main(String[] args) {
		System.out.println("content-type: text/html");
		System.out.println("");

		new Form();
	}

}
