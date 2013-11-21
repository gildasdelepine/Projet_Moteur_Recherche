package bd;

import java.sql.*;


public class BD {
	Connection conn = null; 
	String dbhost = "dbhost";
	String dbname = "";
	String dblogin = "";
	String dbpwd = "";

	public BD() {
		try { 
			Class.forName("com.mysql.jdbc.Driver").newInstance(); 
			conn = DriverManager.getConnection("jdbc:mysql://"+dbhost+"/"+dbname+"?user="+dblogin+"&password="+dbpwd+""); 
			conn.setAutoCommit(true);
		} catch (Exception ex) { 
			ex.printStackTrace(System.out);
		}
	}
	
	public void insert(String livre, String auteur) {
		try { 
			String queryString = "insert into details_livres set nom_livre=\'"+livre+"\', auteur=\'"+auteur+"\'";
			Statement stmt = conn.createStatement(); 
			stmt.executeUpdate(queryString);
			stmt.close();
		} catch (Exception ex) { 
			ex.printStackTrace(System.out);
		}
	}

	public String select() {
		String str = new String("");
		try { 
			Statement stmt = conn.createStatement();
			ResultSet rs = stmt.executeQuery("select * from details_livres");
		
			while (rs.next()) {   
				str += rs.getString("id") + " ";
				str += rs.getString("nom_livre") + " ";			
				str += rs.getString("auteur") + "<br/>";
			}
			rs.close();
			stmt.close();
		} catch (Exception ex) { 
			ex.printStackTrace(System.out);
		}
		return str;
	}

	public void close() {
		try { 		
			conn.close();
		} catch (Exception ex) { 
			ex.printStackTrace(System.out);
		}
	}
/*
	public static void main(String[] args) {
				new BD();
	}
*/

}
