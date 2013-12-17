/* HelloWorld.java */
import java.util.*;

public class HelloWorld{
   public static void main(String[] args){
   
   String input = "";
   for (String s: args){
	input = input+s;
   }

    System.out.println("Content-type: text/html\n\n");
    System.out.println("<html>");
    System.out.println("<head><title>Hello World</title></head>");
    System.out.println("<H1>Upload Effectue avec succes !</H1>");
	System.out.println(input);
	System.out.println("<a href='http://localhost/Projet_Moteur_Recherche/index.php/feedback/setMajDb'>Retourner sur le site</a>");
    System.out.println("</body>");
    System.out.println("</html>");
	}
}