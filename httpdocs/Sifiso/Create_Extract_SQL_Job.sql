--exec Config.dbo.Create_Extract_SQL_Job

SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
-- =============================================
-- Author:		Sifiso Ndlovu
-- Create date: 22/6/2012
-- Description:	
-- =============================================
alter PROCEDURE Create_Extract_SQL_Job (
	-- Add the parameters for the stored procedure here
	@Extract_Job_Name varchar(max),
	@Pkg_Name varchar(max),
	@foldername varchar(max),
	@server_name varchar(max)
	
)
AS
BEGIN
	SET NOCOUNT ON;
	
    declare @Extract_Job_Step_Name varchar(max)	
    
    
	if (select COUNT(*) Job_Count from msdb.dbo.sysjobs where name = @Extract_Job_Name) > 0
	begin
		delete from msdb.dbo.sysjobs where name = @Extract_Job_Name
		exec msdb.dbo.sp_add_job @job_name = @Extract_Job_Name
		exec msdb.dbo.sp_add_jobserver @job_name = @Extract_Job_Name, @server_name = 'dhpcrmcube02'
		print 'Job name: "' + @Extract_Job_Name + '" deleted and then added'
	end
	else
	begin
		exec msdb.dbo.sp_add_job @job_name = @Extract_Job_Name
		exec msdb.dbo.sp_add_jobserver @job_name = @Extract_Job_Name, @server_name = 'dhpcrmcube02'
		print 'Job name: "' + @Extract_Job_Name + '" added'
	end
    
	set @Extract_Job_Step_Name = N'/DTS "\MSDB\' + @foldername+'\'+@Pkg_Name+ '" /SERVER "' + @server_name + '" /CHECKPOINTING OFF /REPORTING E'			
	exec msdb.dbo.sp_add_jobstep @job_name = @Extract_Job_Name, @step_name = @Pkg_Name, @subsystem = N'SSIS', @command = @Extract_Job_Step_Name, @on_success_action = 1

END
GO
