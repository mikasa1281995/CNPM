USE [FinalCNPM]
GO
ALTER TABLE [dbo].[Purchase] DROP CONSTRAINT [DF_Purchase_payment]
GO
/****** Object:  Table [dbo].[Purchase]    Script Date: 5/30/2022 12:04:50 AM ******/
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[Purchase]') AND type in (N'U'))
DROP TABLE [dbo].[Purchase]
GO
/****** Object:  Table [dbo].[Product]    Script Date: 5/30/2022 12:04:50 AM ******/
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[Product]') AND type in (N'U'))
DROP TABLE [dbo].[Product]
GO
/****** Object:  Table [dbo].[Login]    Script Date: 5/30/2022 12:04:50 AM ******/
IF  EXISTS (SELECT * FROM sys.objects WHERE object_id = OBJECT_ID(N'[dbo].[Login]') AND type in (N'U'))
DROP TABLE [dbo].[Login]
GO
/****** Object:  Table [dbo].[Login]    Script Date: 5/30/2022 12:04:50 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Login](
	[UserID] [nchar](10) NOT NULL,
	[UserName] [nchar](50) NOT NULL,
	[Password] [nchar](50) NOT NULL,
	[Lv] [bit] NOT NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Product]    Script Date: 5/30/2022 12:04:50 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Product](
	[productId] [varchar](50) NULL,
	[productName] [varchar](50) NULL,
	[productCount] [varchar](50) NULL,
	[productPrice] [varchar](50) NULL,
	[type] [bit] NULL
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Purchase]    Script Date: 5/30/2022 12:04:50 AM ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Purchase](
	[purchaseId] [int] IDENTITY(1,1) NOT NULL,
	[totalPrice] [varchar](50) NULL,
	[payment] [bit] NULL,
 CONSTRAINT [PK_Purchase] PRIMARY KEY CLUSTERED 
(
	[purchaseId] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
INSERT [dbo].[Login] ([UserID], [UserName], [Password], [Lv]) VALUES (N'1         ', N'admin                                             ', N'123123                                            ', 1)
INSERT [dbo].[Login] ([UserID], [UserName], [Password], [Lv]) VALUES (N'2         ', N'quanghuy                                          ', N'123123                                            ', 0)
INSERT [dbo].[Login] ([UserID], [UserName], [Password], [Lv]) VALUES (N'3         ', N'minhluan                                          ', N'123123                                            ', 0)
GO
INSERT [dbo].[Product] ([productId], [productName], [productCount], [productPrice], [type]) VALUES (N'1', N'Chip AMD Ryzen7 5800', N'15', N'11400000', 0)
INSERT [dbo].[Product] ([productId], [productName], [productCount], [productPrice], [type]) VALUES (N'2', N'GTX 1650', N'10', N'6500000', 0)
INSERT [dbo].[Product] ([productId], [productName], [productCount], [productPrice], [type]) VALUES (N'3', N'i3 10th', N'30', N'2000000', 0)
INSERT [dbo].[Product] ([productId], [productName], [productCount], [productPrice], [type]) VALUES (N'4', N'RAM DDR5 Kingston Fury Beast', N'60', N'9000000', 0)
INSERT [dbo].[Product] ([productId], [productName], [productCount], [productPrice], [type]) VALUES (N'5', N'RTX 3070 Ventus 2x', N'10', N'40000000', 0)
INSERT [dbo].[Product] ([productId], [productName], [productCount], [productPrice], [type]) VALUES (N'6', N'RTX 3080', N'20', N'45600000', 0)
INSERT [dbo].[Product] ([productId], [productName], [productCount], [productPrice], [type]) VALUES (N'7', N'RTX 3090', N'20', N'48000000', 0)
INSERT [dbo].[Product] ([productId], [productName], [productCount], [productPrice], [type]) VALUES (N'8', N'SSD Samsung 870 QVO 8TB 2.5', N'26', N'18500000', 0)
INSERT [dbo].[Product] ([productId], [productName], [productCount], [productPrice], [type]) VALUES (N'9', N'SSD Kingston KC3000 2TB', N'45', N'1600000', 0)
INSERT [dbo].[Product] ([productId], [productName], [productCount], [productPrice], [type]) VALUES (N'10', N'Trident Z5', N'45', N'1600000', 0)
INSERT [dbo].[Product] ([productId], [productName], [productCount], [productPrice], [type]) VALUES (N'11', N'SSD Samsung', N'26', N'1500000', 0)
INSERT [dbo].[Product] ([productId], [productName], [productCount], [productPrice], [type]) VALUES (N'13', N'HDD 1TB', N'15', N'2000000', 0)
GO
SET IDENTITY_INSERT [dbo].[Purchase] ON 

INSERT [dbo].[Purchase] ([purchaseId], [totalPrice], [payment]) VALUES (7, N'22800000', 1)
INSERT [dbo].[Purchase] ([purchaseId], [totalPrice], [payment]) VALUES (8, N'239500000', 0)
SET IDENTITY_INSERT [dbo].[Purchase] OFF
GO
ALTER TABLE [dbo].[Purchase] ADD  CONSTRAINT [DF_Purchase_payment]  DEFAULT ((0)) FOR [payment]
GO
