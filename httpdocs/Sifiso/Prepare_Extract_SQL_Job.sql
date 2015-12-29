Use Sifiso_Config
go
--exec Sifiso_Config.dbo.Prepare_Extract_SQL_Job

--Sifiso_ConfigPrepare_Extract_SQL_Job
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
-- =============================================
-- Author:		Sifiso Ndlovu
-- Create date: 22/6/2012
-- Description:	
-- =============================================
alter PROCEDURE Prepare_Extract_SQL_Job (
	-- Add the parameters for the stored procedure here
	@Extract_Job_Name varchar(max),
	@Pkg_Name varchar(max),
	@foldername varchar(max)
)
AS
BEGIN
	SET NOCOUNT ON;
	declare @Pkg_Count int
	
	--if (select COUNT(*) Job_Count from msdb.dbo.sysjobs where name = @Extract_Job_Name) > 0
	--begin
	--	delete from msdb.dbo.sysjobs where name = @Extract_Job_Name
	--	exec msdb.dbo.sp_add_job @job_name = @Extract_Job_Name
	--	print 'Job name: "' + @Extract_Job_Name + '" deleted and then added'
	--end
	--else
	--begin
	--	exec msdb.dbo.sp_add_job @job_name = @Extract_Job_Name
	--	print 'Job name: "' + @Extract_Job_Name + '" added'
	--end

	--Server = dhpcrm01

	If @foldername = 'MSDB'
	begin
		print 'MSDB folder'
		select @Pkg_Count = COUNT(*) from msdb.dbo.sysssispackages where name = @Pkg_Name 
	end
	else
	begin
		print 'folder not MSDB'
		select @Pkg_Count = COUNT(*) from msdb.dbo.sysssispackages where name = @Pkg_Name 
		and folderid in (select folderid from msdb.dbo.sysssispackagefolders where foldername = @foldername)	
	end

	select @Pkg_Count [Pkg_Count]
	
	--if (@Pkg_Count) > 0
	--begin
	--	print 'package and folder exist'		
	--	-- execute Create_Extract_SQL_Job stored proc	
	--end
	--else
	--begin
	--	print 'either package or folder do not exist'
	--end

END
GO