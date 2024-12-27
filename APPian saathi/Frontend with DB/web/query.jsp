<%@page import="java.sql.DriverManager,java.sql.PreparedStatement,java.sql.Connection"%>
<%
    
    String name = request.getParameter("name");
    String email= request.getParameter("email");
    String contact= request.getParameter("phone");
    String query = request.getParameter("message");
   
           Class.forName("com.mysql.jdbc.Driver");//Driver
            Connection con = DriverManager.getConnection("jdbc:mySQL://localhost:3306/mysql","root","root");
            PreparedStatement st = con.prepareStatement("insert into query_table values(?,?,?,?)");
            st.setString(1,name);
            st.setString(2,email);
            st.setString(3,contact);
            st.setString(4,query);
            st.executeUpdate();
            response.sendRedirect("about.html");
 %>