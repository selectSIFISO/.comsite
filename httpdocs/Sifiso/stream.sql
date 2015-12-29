USE [Config]
GO

/****** Object:  Table [dbo].[Streams]    Script Date: 06/22/2012 17:11:49 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

SET ANSI_PADDING ON
GO

CREATE TABLE [dbo].[Streams](
	[StreamID] [int] IDENTITY(1,1) NOT NULL,
	[StreamDesc] [varchar](100) NULL,
	[RelationshipTypeCode] [varchar](5) NOT NULL,
	[Folder] [varchar](100) NOT NULL,
	[FullPkgName] [varchar](max) NULL,
 CONSTRAINT [PK_Streams] PRIMARY KEY CLUSTERED 
(
	[StreamID] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]

GO

SET ANSI_PADDING OFF
GO

ALTER TABLE [dbo].[Streams] ADD  CONSTRAINT [DF_Streams_PackageLoc]  DEFAULT ('\MSDB') FOR [Folder]
GO

