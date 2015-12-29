USE [Config]
GO

/****** Object:  Table [dbo].[Package_Run_History]    Script Date: 06/22/2012 17:12:13 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

SET ANSI_PADDING ON
GO

CREATE TABLE [dbo].[Package_Run_History](
	[Pkg_id] [int] IDENTITY(1,1) NOT NULL,
	[Pkg_Name] [varchar](255) NOT NULL,
	[Pkg_Description] [varchar](max) NULL,
	[LastRunDate] [datetime] NULL,
	[RunStatus] [varchar](50) NOT NULL,
	[RunStartDate] [datetime] NULL,
 CONSTRAINT [PK_Package_Run_History] PRIMARY KEY CLUSTERED 
(
	[Pkg_id] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]

GO

SET ANSI_PADDING OFF
GO

ALTER TABLE [dbo].[Package_Run_History] ADD  CONSTRAINT [DF_Package_Run_History_RunStatus]  DEFAULT ('Idle') FOR [RunStatus]
GO

