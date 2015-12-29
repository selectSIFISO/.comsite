USE [Config]
GO

/****** Object:  Table [dbo].[StreamsPackages]    Script Date: 06/22/2012 17:11:59 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

SET ANSI_PADDING ON
GO

CREATE TABLE [dbo].[StreamsPackages](
	[SP_Key] [int] IDENTITY(1,1) NOT NULL,
	[StreamID] [int] NOT NULL,
	[Pkg_Dependent_Name] [varchar](255) NOT NULL,
	[Pkg_Independent_Name] [varchar](255) NOT NULL,
 CONSTRAINT [PK_StreamsPackages] PRIMARY KEY CLUSTERED 
(
	[SP_Key] ASC
)WITH (PAD_INDEX  = OFF, STATISTICS_NORECOMPUTE  = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS  = ON, ALLOW_PAGE_LOCKS  = ON) ON [PRIMARY]
) ON [PRIMARY]

GO

SET ANSI_PADDING OFF
GO

ALTER TABLE [dbo].[StreamsPackages]  WITH CHECK ADD  CONSTRAINT [FK_StreamsPackages_Ref_Streams] FOREIGN KEY([StreamID])
REFERENCES [dbo].[Streams] ([StreamID])
GO

ALTER TABLE [dbo].[StreamsPackages] CHECK CONSTRAINT [FK_StreamsPackages_Ref_Streams]
GO

