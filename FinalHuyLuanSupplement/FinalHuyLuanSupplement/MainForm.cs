using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.Data.Sql;
using System.Data.SqlClient;
namespace FinalHuyLuanSupplement
{
    public partial class MainForm : Form
    {
        public MainForm()
        {
            InitializeComponent();
        }

        SqlConnection conn;
        private SqlDataAdapter mydtadp = new SqlDataAdapter();
        private BindingSource bindingSource1 = new BindingSource();
        private void label1_Click(object sender, EventArgs e)
        {

        }

        private void label3_Click(object sender, EventArgs e)
        {

        }

        private void label6_Click(object sender, EventArgs e)
        {

        }

        private void listView2_SelectedIndexChanged(object sender, EventArgs e)
        {
            
        }

        private void MainForm_Load(object sender, EventArgs e)
        {
            IsMdiContainer = true;
            Login lgForm = new Login();
            lgForm.ShowDialog();

            conn = new SqlConnection();
            conn.ConnectionString = @"Data Source=DESKTOP-GP1A9AB\SQLEXPRESS;Initial Catalog=FinalCNPM;Integrated Security=True";
            conn.Open();
            ShowSanPham();
            ShowOrder();
            ShowPurchase();
            LoadCombobox();
        }
        public void LoadCombobox()
        {
            String sqlLoadComboBox = "select productName, productId from Product";
            SqlCommand cmd = new SqlCommand(sqlLoadComboBox, conn);
            SqlDataReader da = cmd.ExecuteReader();
            DataTable dt = new DataTable();
            dt.Load(da);
            da.Dispose();
            comboBox1.DisplayMember = "productName";
            comboBox1.ValueMember = "productId";
            comboBox1.DataSource = dt;
        }
        public void ShowSanPham()
        {
            String sSQLShowSanPham = "SELECT productId, productName, productCount, productPrice FROM Product where type = 0";
            SqlCommand cmd = new SqlCommand(sSQLShowSanPham, conn);
            SqlDataReader da = cmd.ExecuteReader();
            DataTable dt = new DataTable();
            dt.Load(da);
            if (dt.Rows.Count > 0)
            {
                dtViewDatHang.DataSource = dt;
            }
            else
            {
                MessageBox.Show("No Data!");
            }
        }
        public void ShowPurchase()
        {
            String sSQLShowPurchase = "SELECT productId, productName, productCount, productPrice FROM Product where type = 1";
            SqlCommand cmd = new SqlCommand(sSQLShowPurchase, conn);
            SqlDataReader da = cmd.ExecuteReader();
            DataTable dt = new DataTable();
            dt.Load(da);
            dtpurchase.DataSource = dt;
            bindingSource1.DataSource = dt;
        }
        public void ShowOrder()
        {
            String sSQLShowOrder = "SELECT * FROM Purchase";
            SqlCommand cmd = new SqlCommand(sSQLShowOrder, conn);
            SqlDataReader da = cmd.ExecuteReader();
            DataTable dt = new DataTable();
            dt.Load(da);
            dtOrder.DataSource = dt;
        }
        private void listView1_SelectedIndexChanged(object sender, EventArgs e)
        {

        }

        private void dataGridView1_CellContentClick(object sender, DataGridViewCellEventArgs e)
        {

        }

        private void label7_Click(object sender, EventArgs e)
        {

        }

        private void btnExport_Click(object sender, EventArgs e)
        {

        }

        private void tabPage3_Click(object sender, EventArgs e)
        {

        }

        private void btnThem_Click(object sender, EventArgs e)
        {
            String sqlInsert = "INSERT INTO Product VALUES (@productId, @productName, @productCount, @productPrice,'0')";
            SqlCommand cmd  = new SqlCommand(@sqlInsert, conn);
            cmd.Parameters.AddWithValue("productId", txtIdSanpham.Text);
            cmd.Parameters.AddWithValue("productName", txtTenSanpham.Text);
            cmd.Parameters.AddWithValue("productCount", txtSoluong.Text);
            cmd.Parameters.AddWithValue("productPrice", txtGia.Text);
            cmd.ExecuteNonQuery();
            ShowSanPham();
        }

        private void btnXoa_Click(object sender, EventArgs e)
        {
            String sqlDel = "DELETE FROM Product WHERE productId = @productId";
            SqlCommand cmd = new SqlCommand(sqlDel, conn);
            cmd.Parameters.AddWithValue("productId", txtIdSanpham.Text); 
            cmd.Parameters.AddWithValue("productName", txtTenSanpham.Text);
            cmd.Parameters.AddWithValue("productCount", txtSoluong.Text);
            cmd.Parameters.AddWithValue("productPrice", txtGia.Text);
            cmd.ExecuteNonQuery();
            ShowSanPham();
        }

        private void btnSearch_Click(object sender, EventArgs e)
        {
            String sqlSearch = "SELECT * from Product where productName LIKE '%" + txtSearch.Text + "%'";
            SqlCommand cmd = new SqlCommand(sqlSearch, conn);
            cmd.ExecuteNonQuery();
            SqlDataReader da = cmd.ExecuteReader();
            DataTable dt = new DataTable();
            dt.Load(da);
            if (dt.Rows.Count > 0)
            {
                dtViewDatHang.DataSource = dt;
            }
            else
            {
                MessageBox.Show("No Data!");
            }
        }

        private void btnAdd_Click(object sender, EventArgs e)
        {
            String sqlInsert = "insert into Product (productId, productName, productCount, productPrice, type) " +
                "select productId, productName, " + txtQuantity.Text + ", productPrice, 1 as type " +
                "from Product where type = 0 and productId = " + comboBox1.SelectedValue;
            SqlCommand cmd1 = new SqlCommand(@sqlInsert, conn);
            cmd1.ExecuteNonQuery();
            ShowPurchase();
            TongTien();
        }

        public void TongTien()
        {
            String sqlTongTien = "select sum(cast(productCount as int) * cast(productPrice as int)) as purchaseTotal " +
                "from Product " +
                "where type = 1";
            SqlCommand cmd2 = new SqlCommand(sqlTongTien, conn);
            SqlDataReader da = cmd2.ExecuteReader();
            DataTable dt = new DataTable();
            dt.Load(da);
            lbTongTien.Text = dt.Rows[0][0].ToString();
        }

        private void tabPage1_Click(object sender, EventArgs e)
        {

        }

        private void label12_Click(object sender, EventArgs e)
        {

        }

        private void btnTaoDon_Click(object sender, EventArgs e)
        {
            String sqlInsert = "insert into Purchase(totalPrice) values('" + lbTongTien.Text +"')";
            SqlCommand cmd1 = new SqlCommand(@sqlInsert, conn);
            cmd1.ExecuteNonQuery();
            MessageBox.Show("Tạo đợn hàng thành công");
            ShowOrder();
        }

        private void btnDel_Click(object sender, EventArgs e)
        {
            String sqlInsert = "Delete from product where type = 1";
            SqlCommand cmd1 = new SqlCommand(@sqlInsert, conn);
            cmd1.ExecuteNonQuery();
            MessageBox.Show("Đã xoá đơn thành công");
            ShowPurchase();
            TongTien();
        }

        private void btnSaveOrder_Click(object sender, EventArgs e)
        {
            mydtadp.Update((DataTable)bindingSource1.DataSource);
            MessageBox.Show("SAVED");
        }
    }
}
