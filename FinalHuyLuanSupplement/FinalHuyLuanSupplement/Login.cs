using System.Data;
using System.Data.Sql;
using System.Data.SqlClient;
namespace FinalHuyLuanSupplement
{
    public partial class Login : Form
    {
        public Login()
        {
            InitializeComponent();
        }

        private void Login_Load(object sender, EventArgs e)
        {

        }

        private void label1_Click(object sender, EventArgs e)
        {

        }

        private void label1_Click_1(object sender, EventArgs e)
        {

        }

        private void btnClose_Click(object sender, EventArgs e)
        {
            MessageBox.Show("Click okay to exit system!");
            Application.Exit();
        }

        private void btnLogin_Click(object sender, EventArgs e)
        {
            //conn.ConnectionString = @"Data Source=(local)\SQL2017;Initial Catalog=SE.T6C4Lab2;Integrated Security=True";
            SqlConnection conn = new SqlConnection();
            conn.ConnectionString = @"Data Source=DESKTOP-GP1A9AB\SQLEXPRESS;Initial Catalog=FinalCNPM;Integrated Security=True";
            conn.Open();
            String sSQL = "SELECT UserName, Password FROM Login WHERE " +
                        "UserName='" + txtUsername.Text + "' and Password='" + txtPassword.Text + "'";
            SqlCommand cmd = new SqlCommand(sSQL, conn); 
            SqlDataAdapter da = new SqlDataAdapter(cmd);
            DataTable dt = new DataTable();
            da.Fill(dt);
            if (dt.Rows.Count > 0)
            {
                MessageBox.Show("Login Successful!");
                this.Close();
            }
            else
            {
                MessageBox.Show("Invalid Login. Please check userID or Password!");
            }
            conn.Close();
        }
    }
}