using System.Data;
using System.Data.Sql;
using System.Data.SqlClient;
namespace FinalHuyLuanSupplement
{
    partial class MainForm
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        /// Required method for Designer support - do not modify
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            this.tabControl1 = new System.Windows.Forms.TabControl();
            this.tabPage1 = new System.Windows.Forms.TabPage();
            this.lbTongTien = new System.Windows.Forms.Label();
            this.label12 = new System.Windows.Forms.Label();
            this.dtpurchase = new System.Windows.Forms.DataGridView();
            this.btnTaoDon = new System.Windows.Forms.Button();
            this.label4 = new System.Windows.Forms.Label();
            this.btnDel = new System.Windows.Forms.Button();
            this.btnAdd = new System.Windows.Forms.Button();
            this.comboBox1 = new System.Windows.Forms.ComboBox();
            this.txtQuantity = new System.Windows.Forms.TextBox();
            this.label3 = new System.Windows.Forms.Label();
            this.label2 = new System.Windows.Forms.Label();
            this.label1 = new System.Windows.Forms.Label();
            this.tabPage2 = new System.Windows.Forms.TabPage();
            this.btnSaveOrder = new System.Windows.Forms.Button();
            this.dtOrder = new System.Windows.Forms.DataGridView();
            this.btnPrint = new System.Windows.Forms.Button();
            this.label6 = new System.Windows.Forms.Label();
            this.label5 = new System.Windows.Forms.Label();
            this.tabPage3 = new System.Windows.Forms.TabPage();
            this.txtSearch = new System.Windows.Forms.TextBox();
            this.btnSearch = new System.Windows.Forms.Button();
            this.btnXoa = new System.Windows.Forms.Button();
            this.btnThem = new System.Windows.Forms.Button();
            this.txtGia = new System.Windows.Forms.TextBox();
            this.txtSoluong = new System.Windows.Forms.TextBox();
            this.txtTenSanpham = new System.Windows.Forms.TextBox();
            this.txtIdSanpham = new System.Windows.Forms.TextBox();
            this.label11 = new System.Windows.Forms.Label();
            this.label10 = new System.Windows.Forms.Label();
            this.label9 = new System.Windows.Forms.Label();
            this.label8 = new System.Windows.Forms.Label();
            this.dtViewDatHang = new System.Windows.Forms.DataGridView();
            this.label7 = new System.Windows.Forms.Label();
            this.tabControl1.SuspendLayout();
            this.tabPage1.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)(this.dtpurchase)).BeginInit();
            this.tabPage2.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)(this.dtOrder)).BeginInit();
            this.tabPage3.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)(this.dtViewDatHang)).BeginInit();
            this.SuspendLayout();
            // 
            // tabControl1
            // 
            this.tabControl1.Controls.Add(this.tabPage1);
            this.tabControl1.Controls.Add(this.tabPage2);
            this.tabControl1.Controls.Add(this.tabPage3);
            this.tabControl1.Location = new System.Drawing.Point(0, 2);
            this.tabControl1.Name = "tabControl1";
            this.tabControl1.SelectedIndex = 0;
            this.tabControl1.Size = new System.Drawing.Size(987, 603);
            this.tabControl1.TabIndex = 0;
            // 
            // tabPage1
            // 
            this.tabPage1.Controls.Add(this.lbTongTien);
            this.tabPage1.Controls.Add(this.label12);
            this.tabPage1.Controls.Add(this.dtpurchase);
            this.tabPage1.Controls.Add(this.btnTaoDon);
            this.tabPage1.Controls.Add(this.label4);
            this.tabPage1.Controls.Add(this.btnDel);
            this.tabPage1.Controls.Add(this.btnAdd);
            this.tabPage1.Controls.Add(this.comboBox1);
            this.tabPage1.Controls.Add(this.txtQuantity);
            this.tabPage1.Controls.Add(this.label3);
            this.tabPage1.Controls.Add(this.label2);
            this.tabPage1.Controls.Add(this.label1);
            this.tabPage1.Location = new System.Drawing.Point(4, 29);
            this.tabPage1.Name = "tabPage1";
            this.tabPage1.Padding = new System.Windows.Forms.Padding(3);
            this.tabPage1.Size = new System.Drawing.Size(979, 570);
            this.tabPage1.TabIndex = 0;
            this.tabPage1.Text = "Đặt Hàng";
            this.tabPage1.UseVisualStyleBackColor = true;
            this.tabPage1.Click += new System.EventHandler(this.tabPage1_Click);
            // 
            // lbTongTien
            // 
            this.lbTongTien.AutoSize = true;
            this.lbTongTien.Font = new System.Drawing.Font("Snap ITC", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point);
            this.lbTongTien.Location = new System.Drawing.Point(607, 255);
            this.lbTongTien.Name = "lbTongTien";
            this.lbTongTien.Size = new System.Drawing.Size(29, 27);
            this.lbTongTien.TabIndex = 12;
            this.lbTongTien.Text = "0";
            // 
            // label12
            // 
            this.label12.AutoSize = true;
            this.label12.Font = new System.Drawing.Font("Snap ITC", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point);
            this.label12.Location = new System.Drawing.Point(519, 253);
            this.label12.Name = "label12";
            this.label12.Size = new System.Drawing.Size(72, 27);
            this.label12.TabIndex = 11;
            this.label12.Text = "Tổng:";
            this.label12.Click += new System.EventHandler(this.label12_Click);
            // 
            // dtpurchase
            // 
            this.dtpurchase.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            this.dtpurchase.Location = new System.Drawing.Point(2, 289);
            this.dtpurchase.Name = "dtpurchase";
            this.dtpurchase.RowHeadersWidth = 51;
            this.dtpurchase.RowTemplate.Height = 29;
            this.dtpurchase.Size = new System.Drawing.Size(971, 275);
            this.dtpurchase.TabIndex = 10;
            // 
            // btnTaoDon
            // 
            this.btnTaoDon.Location = new System.Drawing.Point(798, 221);
            this.btnTaoDon.Name = "btnTaoDon";
            this.btnTaoDon.Size = new System.Drawing.Size(138, 49);
            this.btnTaoDon.TabIndex = 9;
            this.btnTaoDon.Text = "Tạo Đơn";
            this.btnTaoDon.UseVisualStyleBackColor = true;
            this.btnTaoDon.Click += new System.EventHandler(this.btnTaoDon_Click);
            // 
            // label4
            // 
            this.label4.AutoSize = true;
            this.label4.Font = new System.Drawing.Font("Tempus Sans ITC", 12F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point);
            this.label4.Location = new System.Drawing.Point(53, 255);
            this.label4.Name = "label4";
            this.label4.Size = new System.Drawing.Size(300, 26);
            this.label4.TabIndex = 7;
            this.label4.Text = "Danh Sách Sản Phẩm Đã Thêm:";
            // 
            // btnDel
            // 
            this.btnDel.Location = new System.Drawing.Point(423, 211);
            this.btnDel.Name = "btnDel";
            this.btnDel.Size = new System.Drawing.Size(94, 29);
            this.btnDel.TabIndex = 6;
            this.btnDel.Text = "Xoá";
            this.btnDel.UseVisualStyleBackColor = true;
            this.btnDel.Click += new System.EventHandler(this.btnDel_Click);
            // 
            // btnAdd
            // 
            this.btnAdd.Location = new System.Drawing.Point(268, 211);
            this.btnAdd.Name = "btnAdd";
            this.btnAdd.Size = new System.Drawing.Size(94, 29);
            this.btnAdd.TabIndex = 5;
            this.btnAdd.Text = "Thêm";
            this.btnAdd.UseVisualStyleBackColor = true;
            this.btnAdd.Click += new System.EventHandler(this.btnAdd_Click);
            // 
            // comboBox1
            // 
            this.comboBox1.FormattingEnabled = true;
            this.comboBox1.Location = new System.Drawing.Point(238, 123);
            this.comboBox1.Name = "comboBox1";
            this.comboBox1.Size = new System.Drawing.Size(319, 28);
            this.comboBox1.TabIndex = 4;
            // 
            // txtQuantity
            // 
            this.txtQuantity.Location = new System.Drawing.Point(238, 169);
            this.txtQuantity.Name = "txtQuantity";
            this.txtQuantity.Size = new System.Drawing.Size(319, 27);
            this.txtQuantity.TabIndex = 3;
            // 
            // label3
            // 
            this.label3.AutoSize = true;
            this.label3.Font = new System.Drawing.Font("Snap ITC", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point);
            this.label3.Location = new System.Drawing.Point(53, 170);
            this.label3.Name = "label3";
            this.label3.Size = new System.Drawing.Size(111, 27);
            this.label3.TabIndex = 2;
            this.label3.Text = "Số Lượng";
            this.label3.Click += new System.EventHandler(this.label3_Click);
            // 
            // label2
            // 
            this.label2.AutoSize = true;
            this.label2.Font = new System.Drawing.Font("Snap ITC", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point);
            this.label2.Location = new System.Drawing.Point(53, 121);
            this.label2.Name = "label2";
            this.label2.Size = new System.Drawing.Size(168, 27);
            this.label2.TabIndex = 1;
            this.label2.Text = "Tên Sản Phẩm";
            // 
            // label1
            // 
            this.label1.AutoSize = true;
            this.label1.Font = new System.Drawing.Font("Brush Script MT", 36F, ((System.Drawing.FontStyle)((System.Drawing.FontStyle.Bold | System.Drawing.FontStyle.Italic))), System.Drawing.GraphicsUnit.Point);
            this.label1.Location = new System.Drawing.Point(391, 20);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(253, 73);
            this.label1.TabIndex = 0;
            this.label1.Text = "Đặt Hàng";
            this.label1.Click += new System.EventHandler(this.label1_Click);
            // 
            // tabPage2
            // 
            this.tabPage2.Controls.Add(this.btnSaveOrder);
            this.tabPage2.Controls.Add(this.dtOrder);
            this.tabPage2.Controls.Add(this.btnPrint);
            this.tabPage2.Controls.Add(this.label6);
            this.tabPage2.Controls.Add(this.label5);
            this.tabPage2.Location = new System.Drawing.Point(4, 29);
            this.tabPage2.Name = "tabPage2";
            this.tabPage2.Padding = new System.Windows.Forms.Padding(3);
            this.tabPage2.Size = new System.Drawing.Size(979, 570);
            this.tabPage2.TabIndex = 1;
            this.tabPage2.Text = "Xuất Kho";
            this.tabPage2.UseVisualStyleBackColor = true;
            // 
            // btnSaveOrder
            // 
            this.btnSaveOrder.Location = new System.Drawing.Point(796, 51);
            this.btnSaveOrder.Name = "btnSaveOrder";
            this.btnSaveOrder.Size = new System.Drawing.Size(138, 49);
            this.btnSaveOrder.TabIndex = 13;
            this.btnSaveOrder.Text = "Save";
            this.btnSaveOrder.UseVisualStyleBackColor = true;
            this.btnSaveOrder.Click += new System.EventHandler(this.btnSaveOrder_Click);
            // 
            // dtOrder
            // 
            this.dtOrder.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            this.dtOrder.Location = new System.Drawing.Point(6, 113);
            this.dtOrder.Name = "dtOrder";
            this.dtOrder.RowHeadersWidth = 51;
            this.dtOrder.RowTemplate.Height = 29;
            this.dtOrder.Size = new System.Drawing.Size(970, 388);
            this.dtOrder.TabIndex = 12;
            this.dtOrder.CellContentClick += new System.Windows.Forms.DataGridViewCellEventHandler(this.dataGridView1_CellContentClick);
            // 
            // btnPrint
            // 
            this.btnPrint.Location = new System.Drawing.Point(399, 507);
            this.btnPrint.Name = "btnPrint";
            this.btnPrint.Size = new System.Drawing.Size(138, 49);
            this.btnPrint.TabIndex = 11;
            this.btnPrint.Text = "In phiếu";
            this.btnPrint.UseVisualStyleBackColor = true;
            // 
            // label6
            // 
            this.label6.AutoSize = true;
            this.label6.Font = new System.Drawing.Font("Tempus Sans ITC", 12F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point);
            this.label6.Location = new System.Drawing.Point(8, 84);
            this.label6.Name = "label6";
            this.label6.Size = new System.Drawing.Size(253, 26);
            this.label6.TabIndex = 8;
            this.label6.Text = "Danh Sách Đơn Đặt Hàng:";
            this.label6.Click += new System.EventHandler(this.label6_Click);
            // 
            // label5
            // 
            this.label5.AutoSize = true;
            this.label5.Font = new System.Drawing.Font("Brush Script MT", 36F, ((System.Drawing.FontStyle)((System.Drawing.FontStyle.Bold | System.Drawing.FontStyle.Italic))), System.Drawing.GraphicsUnit.Point);
            this.label5.Location = new System.Drawing.Point(347, 28);
            this.label5.Name = "label5";
            this.label5.Size = new System.Drawing.Size(243, 73);
            this.label5.TabIndex = 1;
            this.label5.Text = "Xuất Kho";
            // 
            // tabPage3
            // 
            this.tabPage3.Controls.Add(this.txtSearch);
            this.tabPage3.Controls.Add(this.btnSearch);
            this.tabPage3.Controls.Add(this.btnXoa);
            this.tabPage3.Controls.Add(this.btnThem);
            this.tabPage3.Controls.Add(this.txtGia);
            this.tabPage3.Controls.Add(this.txtSoluong);
            this.tabPage3.Controls.Add(this.txtTenSanpham);
            this.tabPage3.Controls.Add(this.txtIdSanpham);
            this.tabPage3.Controls.Add(this.label11);
            this.tabPage3.Controls.Add(this.label10);
            this.tabPage3.Controls.Add(this.label9);
            this.tabPage3.Controls.Add(this.label8);
            this.tabPage3.Controls.Add(this.dtViewDatHang);
            this.tabPage3.Controls.Add(this.label7);
            this.tabPage3.Location = new System.Drawing.Point(4, 29);
            this.tabPage3.Name = "tabPage3";
            this.tabPage3.Padding = new System.Windows.Forms.Padding(3);
            this.tabPage3.Size = new System.Drawing.Size(979, 570);
            this.tabPage3.TabIndex = 2;
            this.tabPage3.Text = "Nhập Hàng";
            this.tabPage3.UseVisualStyleBackColor = true;
            this.tabPage3.Click += new System.EventHandler(this.tabPage3_Click);
            // 
            // txtSearch
            // 
            this.txtSearch.Location = new System.Drawing.Point(558, 261);
            this.txtSearch.Name = "txtSearch";
            this.txtSearch.Size = new System.Drawing.Size(251, 27);
            this.txtSearch.TabIndex = 28;
            // 
            // btnSearch
            // 
            this.btnSearch.Location = new System.Drawing.Point(840, 259);
            this.btnSearch.Name = "btnSearch";
            this.btnSearch.Size = new System.Drawing.Size(94, 29);
            this.btnSearch.TabIndex = 27;
            this.btnSearch.Text = "Tìm Kiếm";
            this.btnSearch.UseVisualStyleBackColor = true;
            this.btnSearch.Click += new System.EventHandler(this.btnSearch_Click);
            // 
            // btnXoa
            // 
            this.btnXoa.Location = new System.Drawing.Point(676, 129);
            this.btnXoa.Name = "btnXoa";
            this.btnXoa.Size = new System.Drawing.Size(142, 39);
            this.btnXoa.TabIndex = 26;
            this.btnXoa.Text = "Xoá SP theo id";
            this.btnXoa.UseVisualStyleBackColor = true;
            this.btnXoa.Click += new System.EventHandler(this.btnXoa_Click);
            // 
            // btnThem
            // 
            this.btnThem.Location = new System.Drawing.Point(676, 71);
            this.btnThem.Name = "btnThem";
            this.btnThem.Size = new System.Drawing.Size(142, 37);
            this.btnThem.TabIndex = 25;
            this.btnThem.Text = "Thêm SP";
            this.btnThem.UseVisualStyleBackColor = true;
            this.btnThem.Click += new System.EventHandler(this.btnThem_Click);
            // 
            // txtGia
            // 
            this.txtGia.Location = new System.Drawing.Point(265, 188);
            this.txtGia.Name = "txtGia";
            this.txtGia.Size = new System.Drawing.Size(251, 27);
            this.txtGia.TabIndex = 24;
            // 
            // txtSoluong
            // 
            this.txtSoluong.Location = new System.Drawing.Point(265, 132);
            this.txtSoluong.Name = "txtSoluong";
            this.txtSoluong.Size = new System.Drawing.Size(251, 27);
            this.txtSoluong.TabIndex = 23;
            // 
            // txtTenSanpham
            // 
            this.txtTenSanpham.Location = new System.Drawing.Point(265, 81);
            this.txtTenSanpham.Name = "txtTenSanpham";
            this.txtTenSanpham.Size = new System.Drawing.Size(251, 27);
            this.txtTenSanpham.TabIndex = 22;
            // 
            // txtIdSanpham
            // 
            this.txtIdSanpham.Location = new System.Drawing.Point(265, 22);
            this.txtIdSanpham.Name = "txtIdSanpham";
            this.txtIdSanpham.Size = new System.Drawing.Size(251, 27);
            this.txtIdSanpham.TabIndex = 21;
            // 
            // label11
            // 
            this.label11.AutoSize = true;
            this.label11.Font = new System.Drawing.Font("Tempus Sans ITC", 12F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point);
            this.label11.Location = new System.Drawing.Point(81, 189);
            this.label11.Name = "label11";
            this.label11.Size = new System.Drawing.Size(43, 26);
            this.label11.TabIndex = 20;
            this.label11.Text = "Giá";
            // 
            // label10
            // 
            this.label10.AutoSize = true;
            this.label10.Font = new System.Drawing.Font("Tempus Sans ITC", 12F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point);
            this.label10.Location = new System.Drawing.Point(81, 132);
            this.label10.Name = "label10";
            this.label10.Size = new System.Drawing.Size(97, 26);
            this.label10.TabIndex = 19;
            this.label10.Text = "Số Lượng";
            // 
            // label9
            // 
            this.label9.AutoSize = true;
            this.label9.Font = new System.Drawing.Font("Tempus Sans ITC", 12F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point);
            this.label9.Location = new System.Drawing.Point(81, 81);
            this.label9.Name = "label9";
            this.label9.Size = new System.Drawing.Size(145, 26);
            this.label9.TabIndex = 18;
            this.label9.Text = "Tên Sản Phẩm";
            // 
            // label8
            // 
            this.label8.AutoSize = true;
            this.label8.Font = new System.Drawing.Font("Tempus Sans ITC", 12F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point);
            this.label8.Location = new System.Drawing.Point(81, 22);
            this.label8.Name = "label8";
            this.label8.Size = new System.Drawing.Size(129, 26);
            this.label8.TabIndex = 17;
            this.label8.Text = "Id Sản Phẩm";
            // 
            // dtViewDatHang
            // 
            this.dtViewDatHang.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            this.dtViewDatHang.Location = new System.Drawing.Point(10, 308);
            this.dtViewDatHang.Name = "dtViewDatHang";
            this.dtViewDatHang.RowHeadersWidth = 51;
            this.dtViewDatHang.RowTemplate.Height = 29;
            this.dtViewDatHang.SelectionMode = System.Windows.Forms.DataGridViewSelectionMode.FullRowSelect;
            this.dtViewDatHang.Size = new System.Drawing.Size(958, 248);
            this.dtViewDatHang.TabIndex = 16;
            // 
            // label7
            // 
            this.label7.AutoSize = true;
            this.label7.Font = new System.Drawing.Font("Tempus Sans ITC", 12F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point);
            this.label7.Location = new System.Drawing.Point(10, 264);
            this.label7.Name = "label7";
            this.label7.Size = new System.Drawing.Size(212, 26);
            this.label7.TabIndex = 15;
            this.label7.Text = "Danh Sách Hàng Hoá:";
            // 
            // MainForm
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(8F, 20F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(981, 599);
            this.Controls.Add(this.tabControl1);
            this.Name = "MainForm";
            this.Text = "HuyLuan Supplement";
            this.Load += new System.EventHandler(this.MainForm_Load);
            this.tabControl1.ResumeLayout(false);
            this.tabPage1.ResumeLayout(false);
            this.tabPage1.PerformLayout();
            ((System.ComponentModel.ISupportInitialize)(this.dtpurchase)).EndInit();
            this.tabPage2.ResumeLayout(false);
            this.tabPage2.PerformLayout();
            ((System.ComponentModel.ISupportInitialize)(this.dtOrder)).EndInit();
            this.tabPage3.ResumeLayout(false);
            this.tabPage3.PerformLayout();
            ((System.ComponentModel.ISupportInitialize)(this.dtViewDatHang)).EndInit();
            this.ResumeLayout(false);

        }

        #endregion

        private TabControl tabControl1;
        private TabPage tabPage1;
        private TabPage tabPage2;
        private Label label1;
        private Label label3;
        private Label label2;
        private ComboBox comboBox1;
        private TextBox txtQuantity;
        private Button btnTaoDon;
        private Label label4;
        private Button btnDel;
        private Button btnAdd;
        private Label label6;
        private Label label5;
        private Button btnPrint;
        private DataGridView dtOrder;
        private TabPage tabPage3;
        private DataGridView dtViewDatHang;
        private Label label7;
        private TextBox txtSearch;
        private Button btnSearch;
        private Button btnXoa;
        private Button btnThem;
        private TextBox txtGia;
        private TextBox txtSoluong;
        private TextBox txtTenSanpham;
        private TextBox txtIdSanpham;
        private Label label11;
        private Label label10;
        private Label label9;
        private Label label8;
        private DataGridView dtpurchase;
        private Label lbTongTien;
        private Label label12;
        private Button btnSaveOrder;
    }
}